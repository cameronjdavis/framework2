<?php

use Framework2\Routing\Route;
use Framework2\Example\ExampleRestfulHelper;

class ExampleRoutes
{
    const QUERY_STRING = 'query_string';
    const ROUTE_PARAMS = 'route_params';
    const APP_CONFIG = 'app_config';
}

class ExampleRestfulRoutes
{
    const DELETE = 'delete';
    const CREATE = 'create';
    const GET = 'get';
}

return [
    ExampleRoutes::QUERY_STRING => new Route(
            'query_string', \Framework2\Example\QueryString::class, 'queryValues'),
    ExampleRoutes::ROUTE_PARAMS => new Route(
            'route_params_example/{intParam}/blah/{param2}', \Framework2\Example\RouteParams::class, 'useRouteParams', ['intParam' => '\d+', 'param2' => '\w+']),
    ExampleRoutes::APP_CONFIG => new Route(
            'app_config', \Framework2\Example\ConfigExample::class, 'configSetting'),
    ExampleRestfulRoutes::DELETE => new Route(
            'rest_example/{' . ExampleRestfulHelper::ID . '}/delete', ExampleRestfulServices::CONTROLLER, 'delete', ['example_id' => '\d+']),
    ExampleRestfulRoutes::GET => new Route(
            'rest_example/{' . ExampleRestfulHelper::ID . '}', ExampleRestfulServices::CONTROLLER, 'get', ['example_id' => '\d+']),
    ExampleRestfulRoutes::CREATE => new Route(
            'rest_example/create', ExampleRestfulServices::CONTROLLER, 'create'),
];
