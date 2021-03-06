<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

spl_autoload_register(function ($class) {
    $root = dirname(__DIR__);
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if(is_readable($file)) {
        require $root . '/' . str_replace('\\', '/', $class) . '.php';
    }
});

$router = new core\Router();

$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}/{action}');


//$router->add('admin/{controller}/{action}/{page:\w+}', ['namespace' => 'Admin']);
//$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);

$router->add('admin/{controller}/{action}/{id:\d+}', ['namespace' => 'Admin']);
$router->add('{controller}/{action}/{key:\w+}');


$router->dispatch($_SERVER['QUERY_STRING']);
?>  