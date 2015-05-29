<?php

namespace Framework2\Services;

use Framework2\Routing\Router;
use Framework2\Routing\Routes;
use Framework2\ParamConverting\ParamConverters;

/**
 * Repository of services that are lazy loaded.
 * A service is identified by a key string.
 */
class Services
{
    const PARAM_CONVERTERS = 'param_conveters';
    private $instances;
    private $settings;
    private $routes;

    /**
     * @var ServiceFactoryInterface
     */
    private $factory;

    public function __construct(array $settings, ServiceFactoryInterface $factory, Routes $routes)
    {
        $this->settings = $settings;
        $this->factory = $factory;
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
        switch ($key) {
            case Router::class:
                return new Router($this->routes);
            case ParamConverters::class:
                return new ParamConverters(
                        $this->settings[self::PARAM_CONVERTERS]);
            default:
                return $this->factory->create($key, $this->settings, $this);
        }
    }
}
