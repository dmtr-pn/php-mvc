<?php 

require_once __DIR__.'/../core/View.php';

class Controller
{
    protected $route;
    protected $view;
    protected $model;

    public function __construct($route) {
        $this->route = $route;
        $this->view = new View();
    }
}
