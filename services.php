<?php

use Framework2\Templating\PageFactory;
use Framework2\Helper\Input;

class ServiceFactory implements \Framework2\Services\ServiceFactoryInterface
{
    const QUERY_INPUT = 'query_input';
    
    public function create($key, array $settings)
    {
        switch ($key) {
            case PageFactory::class:
                return new PageFactory(
                        $settings['template']['base_page']);
            case self::QUERY_INPUT:
                return new Input(INPUT_GET);
        }
    }
}

return new ServiceFactory();
