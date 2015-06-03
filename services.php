<?php

use Framework2\Services;
use Framework2\Templating\PageBuilder;
use Framework2\Input;
use Framework2\Templating\Renderer;
use Framework2\Routing\Router;

class Service
{
    /**
     * Service to access query param values.
     */
    const QUERY = 'query';

    /**
     * Service to access route param values.
     */
    const ROUTE_PARAMS = 'route_params';
}

return [
    Router::class => function(array $settings, Services $services) {
        return new Router($services->getRoutes());
    },
    Renderer::class => function(array $settings, Services $services) {
        return new Renderer($services->get(Router::class));
    },
    PageBuilder::class => function(array $settings, Services $services) {
        return new PageBuilder(
                $settings[\Config::TEMPLATES][\Config::BASE_PAGE], $services->get(Renderer::class));
    },
    Service::QUERY => function(array $settings, Services $services) {
        return new Input($_GET);
    },
    Service::ROUTE_PARAMS => function(array $settings, Services $services) {
        return new Input($services->get(Router::class)->getParams());
    },
        ] + array_merge(require_once('../src/Example/services.php'));

