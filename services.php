<?php

use Framework2\Templating\PageFactory;
use Framework2\Helper\Input;
use Framework2\Routing\Router;
use Framework2\Routing\Routes;

class ServiceFactory implements \Framework2\Services\ServiceFactoryInterface
{
    const QUERY_INPUT = 'query_input';
    
    private $routes;
    
    public function __construct(Routes $routes)
    {
        $this->routes = $routes;
    }
    
    public function create($key, array $settings)
    {
        switch ($key) {
            case Router::class:
                return new Router($this->routes);
            case PageFactory::class:
                return new PageFactory(
                        $settings['template']['base_page']);
            case self::QUERY_INPUT:
                return new Input(INPUT_GET);
        }
    }
}
