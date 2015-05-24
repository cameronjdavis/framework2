<?php

class TestClass
{

    private $value1;

    public function __construct($value1)
    {
        $this->value1 = $value1;
    }

    public function getValue1()
    {
        return $this->value1;
    }

}