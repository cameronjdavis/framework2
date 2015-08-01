<?php

use Framework2\Services;

return [
    \Framework2\Templating\Renderer::class => function(array $config, Services $s) {
        return (new \Framework2\Templating\Renderer())
                        ->addRenderingParam('router',
                                $s->get(Framework2\Routing\Router::class));
    },
    \Framework2\Templating\PageBuilder::class => function(array $config, Services $s) {
        return new \Framework2\Templating\PageBuilder(
                $config[\TemplatingConfig::TEMPLATES][\TemplatingConfig::BASE_PAGE],
                $s->get(\Framework2\Templating\Renderer::class));
    },
];
