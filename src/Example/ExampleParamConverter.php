<?php

namespace Framework2\Example;

use Framework2\Helper\Input;

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

    public function __construct(Input $query)
    {
        $this->query = $query;
    }

    /**
     * Build a new ExampleClas from query string inputs
     * @return \Framework2\Example\TestClass
     */
    public function build()
    {
        $testClass = new ExampleClass();
        $testClass->exampleValue1 = $this->query->get('qv');
        
        return $testClass;
    }
}
