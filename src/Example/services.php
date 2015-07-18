<?php

use Framework2\Example\ExampleSettingUser;
use Framework2\Services;
use Framework2\Rest\RestfulController;
use Framework2\Example\ExampleRestfulHelper;
use Framework2\Rest\RestfulRouteInfo;

class ExampleRestfulServices
{
    const CONTROLLER = 'example_restful_controller';
    const ROUTE_INFO = 'example_restful_route_info';
}

return [
    ExampleSettingUser::class => function(array $settings, Services $services) {
        return new ExampleSettingUser(
                $settings[ExampleConfig::EXAMPLE_SETTING]);
    },
    \Framework2\Example\QueryString::class => function(array $settings, Services $services) {
        return new \Framework2\Example\QueryString($services->get(Service::QUERY), $services->get(\Framework2\Templating\PageBuilder::class));
    },
    \Framework2\Example\RouteParams::class => function(array $settings, Services $services) {
        return new \Framework2\Example\RouteParams($services->get(Framework2\Routing\Router::class), $services->get(\Framework2\Templating\PageBuilder::class), $services->get(Service::ROUTE_PARAMS));
    },
    \Framework2\Example\ConfigExample::class => function(array $settings, Services $services) {
        return new \Framework2\Example\ConfigExample($services->get(ExampleSettingUser::class), $services->get(\Framework2\Templating\PageBuilder::class), $services->get(\Framework2\Templating\PageBuilder::class));
    },
    ExampleRestfulServices::CONTROLLER => function(array $settings, Services $services) {
        return new RestfulController($services->get(ExampleRestfulHelper::class), $services->get(ExampleRestfulServices::ROUTE_INFO), $services->get(Service::ROUTE_PARAMS));
    },
    ExampleRestfulHelper::class => function(array $settings, Services $services) {
        return new ExampleRestfulHelper($services->get(Service::POST));
    },
    ExampleRestfulServices::ROUTE_INFO => function(array $settings, Services $services) {
        return new RestfulRouteInfo(ExampleRestfulHelper::ID);
    },
];

