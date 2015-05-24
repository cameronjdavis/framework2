<?php

class TestClass2
{

    private $testClass;

    public function __construct(TestClass $testClass)
    {
        $this->testClass = $testClass;
    }

    public function getValue2()
    {
        return $this->testClass->getValue1();
    }

}