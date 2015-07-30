<?php

namespace Framework2\Console;

use Framework2\Routing\Router;

/**
 * Provides methods to display route information.
 */
class Routes
{
    /**
     * A mask to print a formatted row.
     */
    const MASK = "%-17s %-32s %-15s %-35s %-15s\n";

    /**
     * @var Router
     */
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
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
}