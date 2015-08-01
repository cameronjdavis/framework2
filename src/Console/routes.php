<?php

use Framework2\Routing\Route;

class ConsoleRoutes
{
    const LIST_ROUTES = 'routing:list';

    const MATCH_ROUTE = 'routing:match';

    const LIST_CONFIG = 'config:list';
}

return [
    ConsoleRoutes::LIST_ROUTES =>
    new Route(
            ConsoleRoutes::LIST_ROUTES, \Framework2\Console\Routing::class,
            'listRoutes', [], [Route::CONSOLE]),
    ConsoleRoutes::MATCH_ROUTE =>
    new Route(
            ConsoleRoutes::MATCH_ROUTE, \Framework2\Console\Routing::class,
            'matchRoute', [], [Route::CONSOLE]),
    ConsoleRoutes::LIST_CONFIG =>
    new Route(
            ConsoleRoutes::LIST_CONFIG, \Framework2\Console\AppConfig::class,
            'listConfig', [], [Route::CONSOLE]),
];
