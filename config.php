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

}
return [
    Config::TEMPLATES => [
        Config::BASE_PAGE => ROOT . 'template/base.html.php'
    ]] + array_merge(require_once(ROOT . 'src/Console/config.php'),
                require_once(ROOT . 'src/Example/config.php'));
