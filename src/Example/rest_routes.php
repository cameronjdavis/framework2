<?php

use Framework2\Routing\Route;
use Framework2\Example\ExampleRestfulHelper;

class ExampleRestfulRoutes
{
    const DELETE = 'delete';
    const CREATE = 'create';
    const GET = 'get';
    const GET_MULTIPLE = 'get_multiple';
    const UPDATE = 'update';
}

return [
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
