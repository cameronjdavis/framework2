<?php

use Framework2\Services;

class ConsoleServices
{
    const ARGS = 'console_args';

}
return [
    \Framework2\Console\Routes::class => function(array $config, Services $s) {
        return new \Framework2\Console\Routes($s->get(Framework2\Routing\Router::class), $s->get(ConsoleServices::ARGS));
    },
    ConsoleServices::ARGS => function(array $config, Services $s) {
        return new \Framework2\Input($config[ConsoleConfig::ARGV]);
    },
];

