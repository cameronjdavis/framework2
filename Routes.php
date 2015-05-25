<?php

namespace Framework2;

use Framework2\Routing\Route;
use Framework2\Controller\Controller1;

class Routes
{

    const HOME = 'home';
    const CONTACT = 'contact';
    const ROUTE_NOT_FOUND = 'route_not_found';

    public function getRoutes()
    {
        return [
            self::HOME => new Route(Controller1::class, 'home'),
            self::CONTACT => new Route(Controller1::class, 'contact'),
            self::ROUTE_NOT_FOUND => new Route(RouteNotFound::class, 'render'),
        ];
    }

}
