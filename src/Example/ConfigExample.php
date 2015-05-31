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

        $env = getenv(\Config::ENV_VARIABLE);

        $message = $env ? "Environment variable " . \Config::ENV_VARIABLE . " is set to <b>{$env}</b> so config.{$env}.php has been loaded" : "Environment variable " . \Config::ENV_VARIABLE . " is not set. If you set it then environment-specific config will be loaded from config." . \Config::ENV_VARIABLE . ".php. E.g. config.dev.php.";

        $page = $this->pageBuilder->create()
                ->setBody("<h1>App config</h1>
                           <p>Example config setting value is: <em>{$settingValue}</em></p>
                           <p>{$message}</p>
                           <p>Controller action was <em>" . __METHOD__ . "();</em></p>");

        echo $this->pageBuilder->render($page);
    }
}
