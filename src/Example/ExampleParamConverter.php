<?php

namespace Framework2\Example;

use Framework2\Helper\Input;
use Framework2\Routing\Router;

/**
 * Example of a param converter that builds a complex
 * object from basic inputs like the query string
 * or any other injected service.
 */
class ExampleParamConverter
{
    /**
     * @var Input
     */
    private $query;
    
    /**
     * @var Router
     */
    private $router;

    public function __construct(Input $query, Router $router)
    {
        $this->query = $query;
        $this->router = $router;
    }

    /**
     * Build a new ExampleClass from query string and route inputs
     * @return \Framework2\Example\TestClass
     */
    public function build()
    {
        $testClass = new ExampleClass();
        
        $testClass->intVal = $this->query->getInt('intVal');
        $testClass->boolVal = $this->query->getBool('boolVal');
        $testClass->routeParam1 = $this->router->getParams()['contactId'];
        $testClass->routeParam2 = $this->router->getParams()['id2'];
        
        return $testClass;
    }
}
