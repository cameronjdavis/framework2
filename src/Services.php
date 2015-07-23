<?php

namespace Framework2;

/**
 * Repository of services that are lazy loaded.
 * A service is identified by a key.
 */
class Services
{
    /**
     * Array of instantiated services, keyed on service name
     * @var mixed[]
     */
    private $instances;
    
    /**
     * Multidimensional array of config settings
     * @var array
     */
    private $config;
    
    /**
     * Array of callable functions that create services, keyed on service name.
     * @var callable[]
     */
    private $services;

    /**
     * @var Routing\Route
     */
    private $routes;

    /**
     * @param array $config Multidimensional array of config settings
     * @param array $services Array of callable functions that create services, keyed on service name.
     * @param Routing\Route[] $routes
     */
    public function __construct(array $config, array $services, array $routes)
    {
        $this->config = $config;
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

        return $serviceCallback($this->config, $this);
    }

    /**
     * @return Routing\Route[]
     */
    public function getRoutes()
    {
        return $this->routes;
    }
}
