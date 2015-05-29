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

// get the service key of the param converter for the route (if there is one)
$converterKey = $services->get(\Framework2\ParamConverting\ParamConverters::class)
        ->getConverterKey($route);
// get the param converter identified by the service key
$converter = $services->get($converterKey);
// if a converter is specified then use it
$param = $converter ? $converter->convert() : null;

// call the controller action with the optional converted parameter
$controller = $route->getClass();
$action = $route->getMethod();
(new $controller($services))->$action($param);
