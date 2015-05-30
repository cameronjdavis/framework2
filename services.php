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
                        $settings[Config::TEMPLATE][Config::BASE_PAGE],
                        $services->get(Renderer::class));
            case self::QUERY:
                // @todo: pass in $_GET and find the filter_
                // method to filter a variable rather than 
                // a hard-coded constant
                return new Input(INPUT_GET);
            case ExampleParamConverter::class:
                return new ExampleParamConverter(
                        $services->get(self::QUERY));
        }
    }
}
