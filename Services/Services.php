<?php

namespace Framework2\Services;

use Framework2\Routing\Router;
use Framework2\Routing\Routes;

class Services
{
    private $instances;
    private $routes;
    private $settings;

    /**
     * @var ServiceFactoryInterface
     */
    private $factory;

    public function __construct(array $settings, ServiceFactoryInterface $factory, Routes $routes)
    {
        $this->routes = $routes;
        $this->settings = $settings;
        $this->factory = $factory;
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
                $serivce = $this->factory->create($key, $this->settings);
                if ($serivce) {
                    return $serivce;
                }
                throw new \Exception("Service ({$key}) could not be created");
        }
    }
}
