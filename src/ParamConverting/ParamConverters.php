<?php

namespace Framework2\ParamConverting;

use Framework2\Routing\Route;

class ParamConverters
{
    private $map;

    /**
     * Key-value array where the key is a class
     * and the value is the service key of the param converter
     * that can build instances of that class.
     * @param array $map
     */
    public function __construct(array $map)
    {
        $this->map = $map;
    }

    /**
     * Get the service key for a param converter for a route
     * if there is one
     * @param Route $route
     * @return string Service key
     */
    public function getConverterKey(Route $route)
    {
        $paramClass = $this->getParamClass($route);

        return $paramClass ? $this->map[$paramClass] : null;
    }

    /**
     * Get the class of the first param of a route's method
     * @param Route $route
     * @return string Service key
     */
    public function getParamClass(Route $route)
    {
        $method = new \ReflectionMethod($route->getClass(), $route->getMethod());

        // if the method has no parameters
        if (count($method->getParameters()) == 0) {
            return null;
        }

        // return the class of the method's first parameter
        return $method->getParameters()[0]->getClass()->getName();
    }
}
