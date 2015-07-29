<?php

/**
 * Entry point PHP console commands.
 */
// boot the framework
require_once 'boot.php';

// get the requested route from the arguments
$requestedRoute = $argv[1];

// find the route object that matches the requested route
// only look for routes that support Route::CONSOLE delivery method
$route = $services->get(Framework2\Routing\Router::class)->find($requestedRoute,
        Framework2\Routing\Route::CONSOLE);

// if a route was found
if ($route) {
    // call the controller action
    $controller = $route->getServiceName();
    $action = $route->getMethod();
    $services->get($controller)->$action();
} else {
    echo "No route matches '{$requestedRoute}'. Try,\n";
    echo "php " . basename(__FILE__) . " " . Routes::LIST_ROUTES . "\n";
    exit(1);
}
