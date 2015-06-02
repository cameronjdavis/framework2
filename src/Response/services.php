<?php

use Framework2\Services;
use Framework2\Response\HttpResponseBuilder;

return [
    HttpResponseBuilder::class => function(array $settings, Services $services) {
        return new HttpResponseBuilder();
    }
];

