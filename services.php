<?php

use Framework2\Templating\PageFactory;
use Framework2\Helper\Input;
use Framework2\Services\ServiceFactoryInterface;
use Framework2\Services\Services;
use Framework2\ParamConverting\TestClassConverter;

class ServiceFactory implements ServiceFactoryInterface
{
    const QUERY = 'query';

    public function create($key, array $settings, Services $services)
    {
        switch ($key) {
            case PageFactory::class:
                return new PageFactory(
                        $settings['template']['base_page']);
            case TestClassConverter::class:
                return new TestClassConverter(
                        $services->get(self::QUERY));
            case self::QUERY:
                return new Input(INPUT_GET);
        }
    }
}
