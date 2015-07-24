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

    /**
     * Service to access post param values.
     */
    const POST = 'post';
}

return [
    Router::class => function(array $config, Services $s) {
        return new Router($s->getRoutes());
    },
    Renderer::class => function(array $config, Services $s) {
        return (new Renderer())
                        ->addRenderingParam('router', $s->get(Router::class));
    },
    PageBuilder::class => function(array $config, Services $s) {
        return new PageBuilder(
                $config[\Config::TEMPLATES][\Config::BASE_PAGE],
                $s->get(Renderer::class));
    },
    Service::QUERY => function(array $config, Services $s) {
        return new Input($_GET);
    },
    Service::ROUTE_PARAMS => function(array $config, Services $s) {
        return new Input($s->get(Router::class)->getParams());
    },
    Service::POST => function(array $config, Services $s) {
        return new Input($_POST);
    },
    \Framework2\Error\ErrorBuffer::class => function(array $config, Services $s) {
        return new \Framework2\Error\ErrorBuffer();
    },
    Framework2\Controller\Index::class => function(array $config, Services $s) {
        return new Framework2\Controller\Index($s->get(PageBuilder::class),
                $s->get(Renderer::class));
    },
        ] + array_merge(require_once('../src/Example/services.php'));

