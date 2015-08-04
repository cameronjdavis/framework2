<?php

/**
 * Bootstrap file for phpunit.
 */
// set the environment variable so test config and services are loaded on boot
putenv('FRAMEWORK2_ENV=test');

// boot the framework
require_once 'boot.php';
