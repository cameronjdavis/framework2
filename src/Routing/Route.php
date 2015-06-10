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
    private $service;

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
     * @param string $service Name of service to load to fulfill this route.
     * @param string $method Name of method in Controller service. E.g. showUser().
     * @param array $params Associative array of route param regexes keyed on route name. E.g. ['userId' => '\d+'].
     */
    public function __construct($pattern, $service, $method, array $params = [])
    {
        $this->pattern = $pattern;
        $this->service = $service;
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
     * Get the name of the service that will fulfill this route.
     * @return string
     */
    public function getServiceName()
    {
        return $this->service;
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
