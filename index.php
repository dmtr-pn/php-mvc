<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APP</title>
</head>
<body>
    <?php 

    require_once './app/router/Router.php';

    $router = new Router();
    $router->route();
    ?>    
</body>
</html>