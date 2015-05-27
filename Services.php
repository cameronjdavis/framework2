<?php

namespace Framework2;

use Framework2\Routing\Router;
use Framework2\Routes;

class Services
{

    private $instances;
    private $config;
    private $routes;
    private $settings;

    public function __construct(Config $config, Routes $routes)
    {
        $this->config = $config;
        $this->routes = $routes;
        $this->settings = $config->settings;
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
            case Templating\PageFactory::class:
                return new Templating\PageFactory(
                        file_get_contents($this->settings[Config::TEMPLATE][Config::BASE_PAGE]));
            default:
                throw new \Exception("Service ({$key}) could not be created");
        }
    }

}
