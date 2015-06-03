<?php

use Framework2\Services;
use Framework2\Templating\PageBuilder;
use Framework2\Input;
use Framework2\Templating\Renderer;
use Framework2\Routing\Router;

class Service
{
    const QUERY = 'query';
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
    }
        ] + array_merge(require_once('../src/Example/services.php'));

