<?php

$function = function($class){
    $namespacePath = str_replace('Framework2\\', '', $class);
    $filePath = '../'.str_replace('\\', '/', $namespacePath) . '.php';

    include_once $filePath;
};
spl_autoload_register($function);

$services = new Framework2\Services(new Framework2\Config(), new Framework2\Routes());

$routeName = isset($_REQUEST['r']) ? $_REQUEST['r'] : Framework2\Routes::HOME;

$route = $services->get(Framework2\Routing\Router::class)->find($routeName);
$controller = $route->getClass();
$action = $route->getMethod();

echo (new $controller($services))->$action();
