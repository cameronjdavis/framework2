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
$environment = getenv(Config::ENV_VARIABLE);
// if the environemnt variable is set then load its config
if ($environment) {
    $environmentConfig = require_once "../config.{$environment}.php";
    // merge the two configs giving precedence to $environmentConfig
    $config = array_replace_recursive($config, $environmentConfig);
}

$servicesArray = require_once '../services.php';
$routes = require_once '../routes.php';

// get the application's service loader
$services = new Framework2\Services($config, $servicesArray, $routes);

// get the requested route or a default route
$requestedRoute = $services->get(Service::QUERY)->get('r', Routes::HOME);

// find the route object that matches the requested route
$route = $services->get(Framework2\Routing\Router::class)->find($requestedRoute, $_SERVER['REQUEST_METHOD']);

// call the controller action
$controller = $route->getServiceName();
$action = $route->getMethod();
$services->get($controller)->$action();
