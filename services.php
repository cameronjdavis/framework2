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
    Service::QUERY => function(array $config, Services $s) {
        return new \Framework2\Input($config[Config::GET]);
    },
    Service::ROUTE_PARAMS => function(array $config, Services $s) {
        return new \Framework2\Input($s->get(Framework2\Routing\Router::class)->getParams());
    },
    Service::POST => function(array $config, Services $s) {
        return new \Framework2\Input($config[Config::POST]);
    },
    Framework2\Controller\Index::class => function(array $config, Services $s) {
        return new Framework2\Controller\Index($s->get(\Framework2\Templating\PageBuilder::class),
                $s->get(\Framework2\Templating\Renderer::class));
    },
        ] + array_merge(
                require_once(ROOT . 'src/Console/services.php'),
                require_once(ROOT . 'src/Templating/services.php'),
                require_once(ROOT . 'src/Rest/services.php'),
                require_once(ROOT . 'src/Example/services.php')
);
