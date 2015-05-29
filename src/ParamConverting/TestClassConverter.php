<?php

namespace Framework2\ParamConverting;

use Framework2\Helper\Input;

class TestClassConverter
{
    /**
     * @var Input
     */
    private $query;
    
    public function __construct(Input $query)
    {
        $this->query = $query;
    }

    public function convert()
    {
        $test = new TestClass();
        $test->testProperty = $this->query->get('akey', 'default_param_convert_val');

        return $test;
    }
}
