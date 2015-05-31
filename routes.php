<?php

use Framework2\Controller;
use Framework2\Routing\Route;

class Routes
{
    const HOME = 'home';
    const QUERY_STRING = 'query_string';
    const ROUTE_PARAMS = 'route_params';
}

return [
    Routes::HOME => new Route(
            'index', Controller\Index::class, 'home'),
    Routes::QUERY_STRING => new Route(
            'query_string', \Framework2\Example\QueryString::class, 'queryValues'),
    Routes::ROUTE_PARAMS => new Route(
            'route_params_example/{intParam}/blah/{param2}', \Framework2\Example\RouteParams::class, 'useRouteParams', ['intParam' => '\d+', 'param2' => '\w+']),
];
