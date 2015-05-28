<?php

namespace Framework2\Routing;

class Route
{
    private $pattern;
    private $class;
    private $method;
    private $params;

    public function __construct($pattern, $class, $method, array $params = [])
    {
        $this->pattern = $pattern;
        $this->class = $class;
        $this->method = $method;
        $this->params = $params;
    }

    public function getPattern()
    {
        return $this->pattern;
    }

    public function getClass()
    {
        return $this->class;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getParams()
    {
        return $this->params;
    }
}
