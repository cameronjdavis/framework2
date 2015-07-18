<?php

use Framework2\Routing\Route;

class Routes
{
    const HOME = 'home';
}

return [
    Routes::HOME =>
    new Route(
            Routes::HOME, Framework2\Controller\Index::class, 'home'),
        ] + array_merge(require_once('../src/Example/routes.php'), require_once('../src/Example/rest_routes.php'));
