<?php

use Framework2\Services\ServiceFactoryInterface;
use Framework2\Services\Services;
use Framework2\Example\ExampleParamConverter;
use Framework2\Routing\Router;

class ServiceFactory implements ServiceFactoryInterface
{
    public function create($key, array $settings, Services $services)
    {
        switch ($key) {
            case ExampleParamConverter::class:
                return new ExampleParamConverter(
                        $services->get(Services::QUERY),
                        $services->get(Router::class));
        }
    }
}
