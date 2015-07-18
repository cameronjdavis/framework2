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
    const GET_MULTIPLE = 'get_multiple';
    const UPDATE = 'update';
}

return [
    ExampleRoutes::QUERY_STRING => new Route(
            'query_string', \Framework2\Example\QueryString::class, 'queryValues'),
    ExampleRoutes::ROUTE_PARAMS => new Route(
            'route_params_example/{intParam}/blah/{param2}', \Framework2\Example\RouteParams::class, 'useRouteParams', ['intParam' => '\d+', 'param2' => '\w+']),
    ExampleRoutes::APP_CONFIG => new Route(
            'app_config', \Framework2\Example\ConfigExample::class, 'configSetting'),
    ExampleRestfulRoutes::DELETE => new Route(
            'rest_example/{' . ExampleRestfulHelper::ID . '}/delete', ExampleRestfulServices::CONTROLLER, 'delete', [ExampleRestfulHelper::ID => '\d+']),
    ExampleRestfulRoutes::UPDATE => new Route(
            'rest_example/{' . ExampleRestfulHelper::ID . '}/update', ExampleRestfulServices::CONTROLLER, 'update', [ExampleRestfulHelper::ID => '\d+']),
    ExampleRestfulRoutes::GET => new Route(
            'rest_example/{' . ExampleRestfulHelper::ID . '}/get', ExampleRestfulServices::CONTROLLER, 'get', [ExampleRestfulHelper::ID => '\d+']),
    ExampleRestfulRoutes::CREATE => (new Route(
            'rest_example/create', ExampleRestfulServices::CONTROLLER, 'create'))
            ->setHttpMethods([Route::POST]),
    ExampleRestfulRoutes::GET_MULTIPLE => new Route(
            'rest_example/get_multiple', ExampleRestfulServices::CONTROLLER, 'getMultiple'),
];
