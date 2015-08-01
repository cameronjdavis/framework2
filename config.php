<?php

class Config
{
    /**
     * Name of environment variable used to load
     * environment-specific config.
     * E.g. FRAMEWORK2_ENV = "dev" will load config.dev.php
     */
    const ENV_VARIABLE = 'FRAMEWORK2_ENV';

    /**
     * Array index to group templare config settings together.
     */
    const TEMPLATES = 'template';

    /**
     * Base HTML template used to render a page.
     */
    const BASE_PAGE = 'base_page';

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
    Config::TEMPLATES => [
        Config::BASE_PAGE => ROOT . 'template/base.html.php'
    ]] + array_merge(require_once(ROOT . 'src/Console/config.php'),
                require_once(ROOT . 'src/Example/config.php'));
