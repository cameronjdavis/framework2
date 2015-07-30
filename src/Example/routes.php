<?php

use Framework2\Routing\Route;

class ExampleRoutes
{
    const QUERY_STRING = 'query_string';
    const ROUTE_PARAMS = 'route_params';
    const APP_CONFIG = 'app_config';
    const CONSOLE = 'console_example';
}

return [
    ExampleRoutes::QUERY_STRING => new Route(
            'query_string', \Framework2\Example\QueryString::class, 'queryValues'),
    ExampleRoutes::ROUTE_PARAMS => new Route(
            'route_params_example/{intParam}/blah/{param2}', \Framework2\Example\RouteParams::class, 'useRouteParams', ['intParam' => '\d+', 'param2' => '\w+']),
    ExampleRoutes::APP_CONFIG => new Route(
            'app_config', \Framework2\Example\ConfigExample::class, 'configSetting'),
    ExampleRoutes::CONSOLE => new Route(
            ExampleRoutes::CONSOLE, \Framework2\Example\Console::class, 'showExample'),
];
