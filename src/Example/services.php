<?php

use Framework2\Example\ExampleSettingUser;
use Framework2\Services;

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
];

