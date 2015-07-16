<?php

use Framework2\Routing\Route;
use Framework2\Rest\ExampleRestfulHelper;

class ExampleRestfulRoutes
{
    const DELETE = 'delete';
    const CREATE = 'create';
    const GET = 'get';
}

return [
    ExampleRestfulRoutes::DELETE => new Route(
            'rest_example/{' . ExampleRestfulHelper::ID . '}/delete', ExampleRestfulServices::CONTROLLER, 'delete', ['example_id' => '\d+']),
    ExampleRestfulRoutes::GET => new Route(
            'rest_example/{' . ExampleRestfulHelper::ID . '}', ExampleRestfulServices::CONTROLLER, 'get', ['example_id' => '\d+']),
    ExampleRestfulRoutes::CREATE => new Route(
            'rest_example/create', ExampleRestfulServices::CONTROLLER, 'create'),
];
