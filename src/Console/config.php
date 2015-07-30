<?php

class ConsoleConfig
{
    const ARGV = 'console_argv';

}
return [
    // $argv is not set if PHP is loaded via web server
    ConsoleConfig::ARGV => isset($argv) ? $argv : [],
];
