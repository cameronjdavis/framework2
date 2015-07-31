<?php

namespace Framework2\Console;

use Framework2\Routing\Router;
use Framework2\Input;

/**
 * Provides methods to display route information.
 */
class Routing
{
    /**
     * A mask to print a formatted row.
     */
    const MASK = "%-17s %-32s %-15s %-35s %-15s\n";

    /**
     * @var Router
     */
    private $router;

    /**
     * @var Input
     */
    private $argv;

    /**
     * @var string
     */
    private $mask;

    /**
     * @param Router $router
     * @param Input $argv
     * @param string $mask String format used with printf() to output route info.
     */
    public function __construct(Router $router, Input $argv, $mask = self::MASK)
    {
        $this->router = $router;
        $this->argv = $argv;
        $this->mask = $mask;
    }

    /**
     * Echo summary of routes.
     */
    public function listRoutes()
    {
        $routes = $this->router->getRoutes();
        ksort($routes);

        printf($this->mask, 'Route key', 'Service name', 'Method', 'Pattern',
                'Channels');
        printf($this->mask, '---------', '------------', '------', '-------',
                '--------');

        foreach ($routes as $key => $route) {
            $channels = implode(', ', $route->getChannels());
            printf($this->mask, $key, $route->getServiceName(),
                    $route->getMethod() . '()', $route->getPattern(), $channels);
        }
    }

    /**
     * Given a complete route with route params filled in, find the route object
     * that it matches and echo the route info.
     */
    public function matchRoute()
    {
        $requestedRoute = $this->argv->get(2);

        $route = $this->router->find($requestedRoute);

        if ($route) {
            $channels = implode(', ', $route->getChannels());
            printf($this->mask, $this->router->getRouteKey(),
                    $route->getServiceName(), $route->getMethod() . '()',
                    $route->getPattern(), $channels);
        }
    }
}