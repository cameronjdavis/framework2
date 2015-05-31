<?php

class ExampleConfig
{
    const EXAMPLE_SETTING = 'example setting';
}

return [
    ExampleConfig::EXAMPLE_SETTING => 'Value from ' . __FILE__
];
