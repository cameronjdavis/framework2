<?php

namespace Framework2\Routing;

/**
 * A Route maps a string input to a controller class and method.
 * E.g. user/22 maps to UserController->showUser().
 */
class Route
{
    /**
     * HTTP request method/channel
     */
    const GET = 'GET';

    /**
     * HTTP request method/channel
     */
    const POST = 'POST';

    /**
     * HTTP request method/channel
     */
    const PUT = 'PUT';

    /**
     * HTTP request method/channel
     */
    const PATCH = 'PATCH';

    /**
     * HTTP request method/channel
     */
    const DELETE = 'DELETE';

    /**
     * Request channel for console commands
     */
    const CONSOLE = 'CONSOLE';
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
     * List of valid channels. E.g. GET, POST, PATCH, CONSOLE.
     * @var string[]
     */
    private $channel;

    /**
     * @param string $pattern Route pattern with placeholders. E.g. user/{userId}
     * @param string $service Name of service to load to fulfill this route.
     * @param string $method Name of method in Controller service. E.g. showUser().
     * @param array $params Associative array of route param regexes keyed on route name. E.g. ['userId' => '\d+'].
     * @param string[] $channel Array of channels methods this routes allows. E.g. GET, POST, CONSOLE.
     */
    public function __construct($pattern, $service, $method, array $params = [],
            array $channel = [self::GET, self::POST])
    {
        $this->pattern = $pattern;
        $this->service = $service;
        $this->method = $method;
        $this->params = $params;
        $this->channel = $channel;
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

    /**
     * Get the HTTP methods that this route can be used with.
     * @return string[]
     */
    public function getChannels()
    {
        return $this->channel;
    }

    /**
     * Set the channels this route uses.
     * @param string[] $channels E.g. ['GET', 'POST', 'CONSOLE']
     * @return \Framework2\Routing\Route
     */
    public function setChannels($channels)
    {
        $this->channel = $channels;

        return $this;
    }
}
