<?php

namespace Framework2\Routing;

use Framework2\Routing\Route;

class Routes
{
    private $routes;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    /**
     * @return Route[]
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * @param string $key
     * @return Route
     */
    public function getRoute($key)
    {
        return $this->routes[$key];
    }
}
