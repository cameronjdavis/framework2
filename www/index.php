<?php

$function = function($class) {
    $namespacePath = str_replace('Framework2\\', '', $class);
    $filePath = '../src/' . str_replace('\\', '/', $namespacePath) . '.php';

    include_once $filePath;
};
spl_autoload_register($function);

$routes = include '../routes.php';
$config = include '../config.php';
include '../services.php';
$serviceFactory = new ServiceFactory(new Framework2\Routing\Routes($routes));
$services = new Framework2\Services\Services($config, $serviceFactory);

$requestedRoute = $services->get(ServiceFactory::QUERY)->get('r', Routes::HOME);

$route = $services->get(Framework2\Routing\Router::class)->find($requestedRoute);
$controller = $route->getClass();
$action = $route->getMethod();

(new $controller($services))->$action();
