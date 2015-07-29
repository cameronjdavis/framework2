<?php

// boot the framework
require_once '../boot.php';

// get the requested route or a default route
$requestedRoute = $services->get(Service::QUERY)->get('r', Routes::HOME);

// find the route object that matches the requested route
$route = $services->get(Framework2\Routing\Router::class)->find($requestedRoute,
        $_SERVER['REQUEST_METHOD']);

// if a route was found
if ($route) {
    // call the controller action
    $controller = $route->getServiceName();
    $action = $route->getMethod();
    $services->get($controller)->$action();
} else {
    // no route found so 404
    http_response_code(404);
}
