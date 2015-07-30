<?php

use Framework2\Services;

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
    Framework2\Routing\Router::class => function(array $config, Services $s) {
        return new Framework2\Routing\Router($s->getRoutes());
    },
    \Framework2\Templating\Renderer::class => function(array $config, Services $s) {
        return (new \Framework2\Templating\Renderer())
                        ->addRenderingParam('router', $s->get(Framework2\Routing\Router::class));
    },
    \Framework2\Templating\PageBuilder::class => function(array $config, Services $s) {
        return new \Framework2\Templating\PageBuilder(
                $config[\Config::TEMPLATES][\Config::BASE_PAGE],
                $s->get(\Framework2\Templating\Renderer::class));
    },
    Service::QUERY => function(array $config, Services $s) {
        return new \Framework2\Input($_GET);
    },
    Service::ROUTE_PARAMS => function(array $config, Services $s) {
        return new \Framework2\Input($s->get(Framework2\Routing\Router::class)->getParams());
    },
    Service::POST => function(array $config, Services $s) {
        return new \Framework2\Input($_POST);
    },
    \Framework2\Error\ErrorBuffer::class => function(array $config, Services $s) {
        return new \Framework2\Error\ErrorBuffer();
    },
    Framework2\Controller\Index::class => function(array $config, Services $s) {
        return new Framework2\Controller\Index($s->get(\Framework2\Templating\PageBuilder::class),
                $s->get(\Framework2\Templating\Renderer::class));
    },
    \Framework2\Error\ErrorFormatter::class => function(array $config, Services $s) {
        return new \Framework2\Error\ErrorFormatter();
    },
    \Framework2\Rest\JsonResponder::class => function(array $config, Services $s) {
        $useEnvelope = $s->get(Service::QUERY)->getBool(\Framework2\Rest\JsonResponder::ENVELOPE,
                false);
        $envelope = $useEnvelope ? new Framework2\Rest\Envelope() : new Framework2\Rest\NoEnvelope();
        return new \Framework2\Rest\JsonResponder($s->get(\Framework2\Error\ErrorBuffer::class),
                $useEnvelope, $envelope,
                $s->get(\Framework2\Error\ErrorFormatter::class));
    },
        ] + array_merge(require_once(ROOT . 'src/Console/services.php'),
                require_once(ROOT . 'src/Example/services.php'));

