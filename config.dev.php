<?php

/**
 * To have these config settings override those in config.php
 * set the environment variable FRAMEWORK2_ENV in your web
 * server config. To do this in Apache put this in your httpd.conf:
 <IfModule env_module>
    SetEnv FRAMEWORK2_ENV "dev"
 </IfModule>
 */

return [
    Config::TEMPLATES => [
        //Config::BASE_PAGE => '../template/debug.html.php'
    ],
];
