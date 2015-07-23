<?php

use Framework2\Example\ExampleSettingUser;
use Framework2\Services;
use Framework2\Rest\CrudController;
use Framework2\Example\ExampleRestfulHelper;
use Framework2\Rest\RestfulRouteInfo;

class ExampleRestfulServices
{
    const CONTROLLER = 'example_restful_controller';
    const ROUTE_INFO = 'example_restful_route_info';
}

return [
    ExampleSettingUser::class => function(array $config, Services $services) {
        return new ExampleSettingUser(
                $config[ExampleConfig::EXAMPLE_SETTING]);
    },
    \Framework2\Example\QueryString::class => function(array $config, Services $services) {
        return new \Framework2\Example\QueryString($services->get(Service::QUERY), $services->get(\Framework2\Templating\PageBuilder::class));
    },
    \Framework2\Example\RouteParams::class => function(array $config, Services $services) {
        return new \Framework2\Example\RouteParams($services->get(Framework2\Routing\Router::class), $services->get(\Framework2\Templating\PageBuilder::class), $services->get(Service::ROUTE_PARAMS));
    },
    \Framework2\Example\ConfigExample::class => function(array $config, Services $services) {
        return new \Framework2\Example\ConfigExample($services->get(ExampleSettingUser::class), $services->get(\Framework2\Templating\PageBuilder::class), $services->get(\Framework2\Templating\PageBuilder::class));
    },
    \Framework2\Rest\JsonResponder::class => function(array $config, Services $services) {
        return new \Framework2\Rest\JsonResponder($services->get(\Framework2\Error\ErrorBuffer::class));
    },
    ExampleRestfulServices::CONTROLLER => function(array $config, Services $services) {
        return new CrudController($services->get(ExampleRestfulHelper::class), $services->get(ExampleRestfulServices::ROUTE_INFO), $services->get(Service::ROUTE_PARAMS), $services->get(\Framework2\Rest\JsonResponder::class));
    },
    ExampleRestfulHelper::class => function(array $config, Services $services) {
        return new ExampleRestfulHelper($services->get(Service::POST), $services->get(\Framework2\Error\ErrorBuffer::class));
    },
    ExampleRestfulServices::ROUTE_INFO => function(array $config, Services $services) {
        return new RestfulRouteInfo(ExampleRestfulHelper::ID);
    },
];

