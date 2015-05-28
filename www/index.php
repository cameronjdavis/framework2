<?php

$function = function($class) {
    $namespacePath = str_replace('Framework2\\', '', $class);
    $filePath = '../' . str_replace('\\', '/', $namespacePath) . '.php';

    include_once $filePath;
};
spl_autoload_register($function);

$routes = include '../routes.php';
$config = include '../config.php';
$serviceFactory = include '../services.php';
$services = new Framework2\Services\Services($config, $serviceFactory, new Framework2\Routing\Routes($routes));

$requestedRoute = $services->get(ServiceFactory::QUERY_INPUT)->get('r', Routes::HOME);

$route = $services->get(Framework2\Routing\Router::class)->find($requestedRoute);
$controller = $route->getClass();
$action = $route->getMethod();

(new $controller($services))->$action();
