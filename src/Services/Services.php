<?php

namespace Framework2\Services;

use Framework2\Routing\Routes;

/**
 * Repository of services that are lazy loaded.
 * A service is identified by a key.
 */
class Services
{
    private $instances;
    private $settings;
    private $services;
    private $routes;

    public function __construct(array $settings, array $services, Routes $routes)
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
     * @return Routes
     */
    public function getRoutes()
    {
        return $this->routes;
    }
}
