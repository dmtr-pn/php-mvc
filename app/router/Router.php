<?php 

class Router
{
    private $routes = [];

    public function __construct() 
    {
        $routes = require_once 'routes.php';
        foreach ($routes as $route) {
            $this->add($route['path'], $route['controller'], $route['action']);
        }
    }

    public function add($path, $controller, $action = null)
    {
        $route = '/^\/' . preg_replace_callback('/:[a-zA-Z0-9_-]+/', function ($matches) {
            return '(?P<' . substr($matches[0], 1) . '>[a-zA-Z0-9_-]+)';
        }, preg_replace('/\//', '\\/', $path)) . '$/';
        
        array_push($this->routes, ['path' => $route, 'controller' => $controller, 'action' => $action]);
    }

    public function route()
    {
        $path = parse_url($_SERVER['REQUEST_URI']);

        foreach ($this->routes as $route) {
            if (preg_match($route['path'], $path['path'], $matches)) {
                $path = __DIR__.'/../controllers/'.$route['controller'].'Controller.php';

                if(file_exists($path)) {
                    require_once $path;
                    $a = $route['controller'].'Controller';
                    $controller = new $a($route['controller'],$matches);
                    echo $controller->return();
                    return;
                }else {
                    echo "404 - file not found\n";
                    return;
                }
            }
        }
        echo "404 - path not found\n";
    }
}