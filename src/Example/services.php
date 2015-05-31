<?php

use Framework2\Example\ExampleSettingUser;
use Framework2\Services\Services;

return [
    ExampleSettingUser::class => function(array $settings, Services $services) {
        return new ExampleSettingUser(
                $settings[ExampleConfig::EXAMPLE_SETTING]);
    }
];

