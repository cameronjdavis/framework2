<?php

class Router
{

    private $routes;

    public function __construct(Routes $routes)
    {
        $this->routes = $routes;
    }

    public function find($route)
    {
        // @todo: add regex route finding
        if (isset($this->routes->getRoutes()[$route])) {
            return $this->routes->getRoutes()[$route];
        }
    }

    // @todo: add route generation
    public function generate($route, $param1 = null, $param2 = null)
    {
        
    }

}
