<?php

namespace Framework2\Commands;

use Framework2\Routing\Router;

class RouteSummary
{
    /**
     * @var Router
     */
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function listRoutes()
    {
        $routes = $this->router->getRoutes();
        ksort($routes);

        foreach ($routes as $key => $route) {
            echo "{$key}\n";
            echo "\tService: {$route->getServiceName()}\n";
            echo "\tMethod: {$route->getMethod()}()\n";
            echo "\tPattern: {$route->getPattern()}\n";
        }
    }
}