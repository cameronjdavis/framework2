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
    ExampleSettingUser::class => function(array $config, Services $s) {
        return new ExampleSettingUser(
                $config[ExampleConfig::EXAMPLE_SETTING]);
    },
    \Framework2\Example\QueryString::class => function(array $config, Services $s) {
        return new \Framework2\Example\QueryString($s->get(Service::QUERY),
                $s->get(\Framework2\Templating\PageBuilder::class));
    },
    \Framework2\Example\RouteParams::class => function(array $config, Services $s) {
        return new \Framework2\Example\RouteParams($s->get(Framework2\Routing\Router::class),
                $s->get(\Framework2\Templating\PageBuilder::class),
                $s->get(Service::ROUTE_PARAMS));
    },
    \Framework2\Example\ConfigExample::class => function(array $config, Services $s) {
        return new \Framework2\Example\ConfigExample($s->get(ExampleSettingUser::class),
                $s->get(\Framework2\Templating\PageBuilder::class),
                $s->get(\Framework2\Templating\PageBuilder::class));
    },
    ExampleRestfulServices::CONTROLLER => function(array $config, Services $s) {
        return new CrudController($s->get(ExampleRestfulHelper::class),
                $s->get(ExampleRestfulServices::ROUTE_INFO),
                $s->get(Service::ROUTE_PARAMS),
                $s->get(\Framework2\Rest\JsonResponder::class),
                $s->get(\Framework2\Rest\AuthenticationInterface::class));
    },
    ExampleRestfulHelper::class => function(array $config, Services $s) {
        return new ExampleRestfulHelper($s->get(Service::POST),
                $s->get(\Framework2\Error\ErrorBuffer::class));
    },
    ExampleRestfulServices::ROUTE_INFO => function(array $config, Services $s) {
        return new RestfulRouteInfo(ExampleRestfulHelper::ID);
    },
];
