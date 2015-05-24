<?php

require_once('src/routing/Route.php');
require_once('src/controller/Controller1.php');
require_once('src/controller/RouteNotFound.php');

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
