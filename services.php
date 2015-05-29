<?php

use Framework2\Templating\PageFactory;
use Framework2\Helper\Input;
use Framework2\Services\ServiceFactoryInterface;
use Framework2\Services\Services;
use Framework2\Example\ExampleParamConverter;
use Framework2\Templating\Renderer;

class ServiceFactory implements ServiceFactoryInterface
{
    const QUERY = 'query';

    public function create($key, array $settings, Services $services)
    {
        switch ($key) {
            case Renderer::class:
                return new Renderer();
            case PageFactory::class:
                return new PageFactory(
                        $settings['template']['base_page'],
                        $services->get(Renderer::class));
            case self::QUERY:
                return new Input(INPUT_GET);
            case ExampleParamConverter::class:
                return new ExampleParamConverter(
                        $services->get(self::QUERY));
        }
    }
}
