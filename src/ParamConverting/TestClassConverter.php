<?php

namespace Framework2\ParamConverting;

class TestClassConverter
{
    private $query;
    
    public function __construct(\Framework2\Helper\Input $query)
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
