<?php

use Framework2\Services;

return [
    \Framework2\Error\ErrorBuffer::class => function(array $config, Services $s) {
        return new \Framework2\Error\ErrorBuffer();
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
];
