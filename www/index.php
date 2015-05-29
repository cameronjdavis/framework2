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

// instantiate this application's custom services
$serviceFactory = new ServiceFactory();

// load the application's standard services
$services = new Framework2\Services\Services($config, $serviceFactory, new Framework2\Routing\Routes($routes));

// get the requested route
$requestedRoute = $services->get(ServiceFactory::QUERY)->get('r', Routes::HOME);

// find the route object that matches the requested route
$route = $services->get(Framework2\Routing\Router::class)->find($requestedRoute);

// call the controller action with the optional converted parameter
$controller = $route->getClass();
$action = $route->getMethod();
(new $controller($services))->$action($param);
