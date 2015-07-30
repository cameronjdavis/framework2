<?php

use Framework2\Routing\Route;

class ConsoleRoutes
{
    const LIST_ROUTES = 'routes:list';
    const MATCH_ROUTE = 'routes:match';

}
return [
    ConsoleRoutes::LIST_ROUTES =>
    new Route(
            ConsoleRoutes::LIST_ROUTES, \Framework2\Console\Routes::class,
            'listRoutes', [], [Route::CONSOLE]),
    ConsoleRoutes::MATCH_ROUTE =>
    new Route(
            ConsoleRoutes::MATCH_ROUTE, \Framework2\Console\Routes::class,
            'matchRoute', [], [Route::CONSOLE]),
];
