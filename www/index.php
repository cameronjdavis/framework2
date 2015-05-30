<?php

$function = function($class) {
    $namespacePath = str_replace('Framework2\\', '', $class);
    $filePath = '../src/' . str_replace('\\', '/', $namespacePath) . '.php';

    include_once $filePath;
};
spl_autoload_register($function);

// @todo: how do we know whether or not to use config.dev.php? Environment variable?
$config = require_once '../config.php';
$configDev = require_once '../config.dev.php';
$config = array_replace_recursive($config, $configDev);

$routes = require_once '../routes.php';
require_once '../services.php';

// instantiate this application's custom services
$serviceFactory = new ServiceFactory();

// get the application's service loader
$services = new Framework2\Services\Services($config, $serviceFactory, new Framework2\Routing\Routes($routes));

// get the requested route or a default route
$requestedRoute = $services->get(Framework2\Services\Services::QUERY)->get('r', Routes::HOME);

// find the route object that matches the requested route
$route = $services->get(Framework2\Routing\Router::class)->find($requestedRoute);

// call the controller action with the optional converted parameter
$controller = $route->getClass();
$action = $route->getMethod();
(new $controller($services))->$action();
