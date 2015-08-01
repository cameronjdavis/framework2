<?php

class TemplatingConfig
{
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
    TemplatingConfig::TEMPLATES => [
        TemplatingConfig::BASE_PAGE => ROOT . 'template/base.html.php'
        ]];
