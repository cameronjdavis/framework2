<?php

namespace Framework2\Example;

use Framework2\Services\Services;
use Framework2\Templating\PageBuilder;

/**
 * Controller that demonstrates use of config settings.
 */
class ConfigExample
{
    /**
     * @var ExampleSettingUser
     */
    private $settingUser;
    
    /**
     * @var PageBuilder
     */
    private $pageBuilder;

    public function __construct(Services $services)
    {
        $this->settingUser = $services->get(ExampleSettingUser::class);
        $this->pageBuilder = $services->get(PageBuilder::class);
    }

    public function configSetting()
    {
        $settingValue = $this->settingUser->settingValue;
        
        $env = getenv('FRAMEWORK2_ENV');

        $page = $this->pageBuilder->create()
                ->setBody("<h1>App config</h1>
                        Config setting value is: <em>{$settingValue}</em>
                           <p>Controller action was <em>" . __METHOD__ . "();</em></p>");

        echo $this->pageBuilder->render($page);
    }
}
