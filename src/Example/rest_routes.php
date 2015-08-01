<?php

use Framework2\Routing\Route;

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
            'rest_example/{' . \Framework2\Example\ExampleRestfulHelper::ID . '}/delete',
            ExampleRestfulServices::CONTROLLER, 'delete',
            [\Framework2\Example\ExampleRestfulHelper::ID => '\d+']),
    ExampleRestfulRoutes::UPDATE => new Route(
            'rest_example/{' . \Framework2\Example\ExampleRestfulHelper::ID . '}/update',
            ExampleRestfulServices::CONTROLLER, 'update',
            [\Framework2\Example\ExampleRestfulHelper::ID => '\d+']),
    ExampleRestfulRoutes::GET => new Route(
            'rest_example/{' . \Framework2\Example\ExampleRestfulHelper::ID . '}/get',
            ExampleRestfulServices::CONTROLLER, 'get',
            [\Framework2\Example\ExampleRestfulHelper::ID => '\d+']),
    ExampleRestfulRoutes::CREATE => (new Route(
            'rest_example/create', ExampleRestfulServices::CONTROLLER, 'create'))
            ->setChannels([Route::POST]),
    ExampleRestfulRoutes::GET_MULTIPLE => new Route(
            'rest_example/get_multiple', ExampleRestfulServices::CONTROLLER,
            'getMultiple'),
];
