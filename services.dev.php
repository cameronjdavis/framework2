<?php

use Framework2\Services;

return [
    \Framework2\Rest\AuthenticationInterface::class => function(array $config, Services $s) {
        return new \Framework2\Rest\DumbAuthentication(true);
    },
];
