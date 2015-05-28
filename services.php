<?php

use Framework2\Templating\PageFactory;

class ServiceFactory implements \Framework2\Services\ServiceFactoryInterface
{

    public function create($key, array $settings)
    {
        switch ($key) {
            case PageFactory::class:
                return new PageFactory(
                        $settings['template']['base_page']);
        }
    }
}

return new ServiceFactory();
