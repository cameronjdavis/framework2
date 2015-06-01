<?php

namespace Framework2\Routing;

/**
 * A Route maps a string input to a controller class and method.
 * E.g. user/22 maps to UserController->showUser().
 */
class Route
{
    /**
     * @var string
     */
    private $pattern;

    /**
     * @var string
     */
    private $class;

    /**
     * @var string
     */
    private $method;

    /**
     * @var array
     */
    private $params;

    /**
     * @param string $pattern Route pattern with placeholders. E.g. user/{userId}
     * @param string $class Controller class. E.g. Framewor2\UserController.
     * @param string $method Name of method in Controller class. E.g. showUser().
     * @param array $params Associative array of route param regexes keyed on route name. E.g. ['userId' => '\d+'].
     */
    public function __construct($pattern, $class, $method, array $params = [])
    {
        $this->pattern = $pattern;
        $this->class = $class;
        $this->method = $method;
        $this->params = $params;
    }

    /**
     * Get the route pattern without filling in route parameter placeholders.
     * @return string
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * Get the class of the controller this route points to.
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Get the name of the controller method this route points to.
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Get the associative array of route params this route uses.
     * Keyed on param name with value of the regex the route param conforms to.
     * E.g. ['userId' => '\d+']
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }
}
