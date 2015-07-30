<?php

/**
 * Entry point PHP console commands.
 */
// boot the framework
require_once 'boot.php';

// get the requested route from the arguments
$requestedRoute = isset($argv[1]) ? $argv[1] : null;

// find the route object that matches the requested route
// only look for routes that support Route::CONSOLE channel
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
    echo "php " . basename(__FILE__) . " " . ConsoleRoutes::LIST_ROUTES . "\n";
    exit(1);
}
