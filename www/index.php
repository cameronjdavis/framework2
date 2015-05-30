<?php

$function = function($class) {
    $namespacePath = str_replace('Framework2\\', '', $class);
    $filePath = '../src/' . str_replace('\\', '/', $namespacePath) . '.php';

    include_once $filePath;
};
spl_autoload_register($function);

// load the base config
$config = require_once('../config.php');
// get the environemnt variable for this app
$environment = getenv('FRAMEWORK2_ENV');
// if the environemnt variable is set then load its config
if ($environment) {
    $environmentConfig = require_once "../config.{$environment}.php";
    // merge the two configs giving precedence to $environmentConfig
    $config = array_replace_recursive($config, $environmentConfig);
}

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
