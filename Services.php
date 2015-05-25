<?php

namespace Framework2;

use Framework2\Routing\Router;
use Framework2\Routes;

class Services
{

    private $instances;
    private $config;
    private $routes;

    public function __construct(Config $config, Routes $routes)
    {
        $this->config = $config;
        $this->routes = $routes;
    }

    public function get($key)
    {
        if (!isset($this->instances[$key])) {
            $this->instances[$key] = $this->create($key);
        }

        return $this->instances[$key];
    }

    public function create($key)
    {
        switch ($key) {
            case Router::class:
                return new Router($this->routes);
            default:
                throw new \Exception("Service ({$key}) could not be created");
        }
    }

}
