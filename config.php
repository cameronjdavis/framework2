<?php

class Config
{
    /**
     * $_SERVER array
     */
    const SERVER = '$_SERVER';

    /**
     * $_GET array
     */
    const GET = '$_GET';

    /**
     * $_POST array
     */
    const POST = '$_POST';
}

return [
    Config::GET => $_GET,
    Config::POST => $_POST,
    Config::SERVER => $_SERVER,
        ] + array_merge(
                require_once(ROOT . 'src/Console/config.php'),
                require_once(ROOT . 'src/Templating/config.php'),
                require_once(ROOT . 'src/Example/config.php')
);
