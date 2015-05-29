<?php

use Framework2\Templating\PageFactory;
use Framework2\Helper\Input;
use Framework2\Services\ServiceFactoryInterface;
use Framework2\Services\Services;

class ServiceFactory implements ServiceFactoryInterface
{
    const QUERY = 'query';

    public function create($key, array $settings, Services $services)
    {
        switch ($key) {
            case PageFactory::class:
                return new PageFactory(
                        $settings['template']['base_page']);
            case self::QUERY:
                return new Input(INPUT_GET);
        }
    }
}
