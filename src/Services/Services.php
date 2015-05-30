<?php

namespace Framework2\Services;

use Framework2\Routing\Router;
use Framework2\Routing\Routes;
use Framework2\Templating\PageFactory;
use Framework2\Helper\Input;
use Framework2\Templating\Renderer;

/**
 * Repository of services that are lazy loaded.
 * A service is identified by a key string.
 */
class Services
{
    const QUERY = 'query';
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
            case Renderer::class:
                return new Renderer($this->get(Router::class));
            case PageFactory::class:
                return new PageFactory(
                        $this->settings[\Config::TEMPLATE][\Config::BASE_PAGE], $this->get(Renderer::class));
            case self::QUERY:
                // @todo: pass in $_GET and find the filter_
                // method to filter a variable rather than 
                // a hard-coded constant
                return new Input(INPUT_GET);
            default:
                return $this->factory->create($key, $this->settings, $this);
        }
    }
}
