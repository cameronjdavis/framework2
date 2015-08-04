<?php

use Framework2\Services;

return [
    // Override authentication in 'test' environment so that user is always authenticated
    \Framework2\Authentication\AuthenticationInterface::class => function(array $config, Services $s) {
        return new \Framework2\Authentication\DumbAuthentication('Test realm', true);
    },
];
