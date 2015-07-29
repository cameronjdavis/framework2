<?php

/**
 * This is the boot file for the framework.
 * Include this file in your entry point to load the application routes,
 * application config, and to make the service loader available.
 */

/**
 * Constant that points to the directory of this boot file.
 * Use the constant in include/require statements for consistently
 * include files relative to the project root directory.
 * E.g. include ROOT 'src/foo.php';
 */
define('ROOT', __DIR__ . '/');

// set up PHP autoloading so that framework classes are automagically included as needed
$function = function($class) {
    $namespacePath = str_replace('Framework2\\', '', $class);
    $filePath = ROOT . 'src/' . str_replace('\\', '/', $namespacePath) . '.php';

    require_once $filePath;
};
spl_autoload_register($function);

// load the base config and services
$config = require_once ROOT . 'config.php';
$servicesArray = require_once ROOT . 'services.php';
// get the environemnt variable for this app
$environment = getenv(Config::ENV_VARIABLE);
// if the environemnt variable is set then load its config
if ($environment) {
    // merge the two configs giving precedence to $environmentConfig
    $environmentConfig = require_once ROOT . "config.{$environment}.php";
    $config = array_replace_recursive($config, $environmentConfig);

    // merge the two service arrays giving precedence to $environmentServices
    $environmentServices = require_once ROOT . "services.{$environment}.php";
    $servicesArray = array_replace_recursive($servicesArray,
            $environmentServices);
}

// load the routes
$routes = require_once ROOT . 'routes.php';

// create the application's service loader
$services = new Framework2\Services($config, $servicesArray, $routes);
