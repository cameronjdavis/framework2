<?php

use Framework2\Routing\Route;

class Routes
{
    const HOME = 'home';
    const LIST_ROUTES = 'routes:list';
}

return [
    Routes::HOME =>
    new Route(
            Routes::HOME, Framework2\Controller\Index::class, 'home'),
    Routes::LIST_ROUTES =>
    new Route(
            Routes::LIST_ROUTES, \Framework2\Commands\RouteSummary::class, 'listRoutes', [], [Route::CONSOLE]),
        ] + array_merge(require_once(ROOT . 'src/Example/routes.php'), require_once(ROOT . 'src/Example/rest_routes.php'));
