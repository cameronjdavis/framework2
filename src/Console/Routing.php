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
    const MASK = "\033[01;100m%-17s\033[0m %-32s \033[01;100m%-15s\033[0m %-35s \033[01;100m%-15s\033[0m\n";

    /**
     * @var Router
     */
    private $router;

    /**
     * @var Input
     */
    private $argv;

    public function __construct(Router $router, Input $argv)
    {
        $this->router = $router;
        $this->argv = $argv;
    }

    /**
     * Echo summary of routes.
     */
    public function listRoutes()
    {
        $routes = $this->router->getRoutes();
        ksort($routes);

        printf(self::MASK, 'Route key', 'Service name', 'Method', 'Pattern',
                'Channels');
        printf(self::MASK, '---------', '------------', '------', '-------',
                '--------');

        foreach ($routes as $key => $route) {
            $channels = implode(', ', $route->getChannels());
            printf(self::MASK, $key, $route->getServiceName(),
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
            printf(self::MASK, $this->router->getRouteKey(),
                    $route->getServiceName(), $route->getMethod() . '()',
                    $route->getPattern(), $channels);
        } else {
            printf(Colours::ERROR, "No route was found that matches the requested route ({$requestedRoute}).\n");
        }
    }
}