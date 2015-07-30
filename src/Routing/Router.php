<?php

namespace Framework2\Routing;

/**
 * Map a route string to its matching route object,
 * and generate complete route strings by looking up
 * a Route object and applying route params.
 */
class Router
{
    /**
     * @var Route[]
     */
    private $routes;

    /**
     * @var array
     */
    private $routeParams;

    /**
     * @param Route[] $routes
     */
    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    /**
     * Find the Route object for an incoming route string
     * by matching the incoming route with regex.
     * @param string $completeRoute
     * @param string $httpMethod
     * @return Route
     */
    public function find($completeRoute, $httpMethod)
    {
        $matches = null;

        foreach ($this->routes as $key => $route) {
            // if the requested HTTP method is not supported by the current route object
            if (!in_array($httpMethod, $route->getChannels())) {
                continue;
            }

            $params = $route->getParams();

            // add () around each of the route param regex patterns
            // E.g. \d+ becomes (\d+)
            array_walk($params,
                    function(&$val) {
                $val = "({$val})";
            });

            // generate the route using regex patterns for route params
            // e.g. /contact/{id} becomes /contact/(\d+)
            $routeRegex = $this->generate($key, $params);

            // attempt to match the incoming route with the complete route regex
            if (preg_match("({$routeRegex})", $completeRoute, $matches)) {
                unset($matches[0]);

                // remember the route params for later reference.
                // keys come from route param names.
                // values come from regex matches for route params.
                $this->routeParams = array_combine(array_keys($params), $matches);

                return $route;
            }
        }
    }

    /**
     * Lookup a route with $routeKey and fill in its
     * route param placeholders with values from $params
     * @param string $routeKey Name of the route
     * @param array $params Keyed on route param name
     * @return string Complete route
     */
    public function generate($routeKey, array $params = [])
    {
        $route = $this->routes[$routeKey];

        $generated = $route->getPattern();

        foreach ($route->getParams() as $paramKey => $pattern) {
            // @todo: ensure $params[$paramKey] matches regex in $pattern
            $generated = str_replace("{{$paramKey}}", $params[$paramKey],
                    $generated);
        }

        return $generated;
    }

    /**
     * Get the values for route params that were extracted on
     * the last call of find().
     * @return array Route params keyed on route param names
     */
    public function getParams()
    {
        return $this->routeParams;
    }

    /**
     * Get the list of available routes.
     * @return Route[]
     */
    public function getRoutes()
    {
        return $this->routes;
    }
}