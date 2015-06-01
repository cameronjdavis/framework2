<?php

namespace Framework2;

/**
 * Repository of services that are lazy loaded.
 * A service is identified by a key.
 */
class Services
{
    private $instances;
    private $settings;
    private $services;
    
    /**
     * @var Routing\Route
     */
    private $routes;

    /**
     * @param array $settings
     * @param array $services
     * @param Routing\Route[] $routes
     */
    public function __construct(array $settings, array $services, array $routes)
    {
        $this->settings = $settings;
        $this->services = $services;
        $this->routes = $routes;
    }

    /**
     * Get the service identified by $key.
     * @param string $key
     * @return mixed
     */
    public function get($key)
    {
        if (!isset($this->instances[$key])) {
            $this->instances[$key] = $this->create($key);
        }

        return $this->instances[$key];
    }

    /**
     * Create a new instance of the service identified by $key
     * @param string $key
     * @return mixed
     */
    public function create($key)
    {
        $serviceCallback = $this->services[$key];

        return $serviceCallback($this->settings, $this);
    }

    /**
     * @return Routing\Route[]
     */
    public function getRoutes()
    {
        return $this->routes;
    }
}
