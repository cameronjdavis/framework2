<?php

require_once('../config.php');
require_once('../services.php');
require_once('../routes.php');

$services = new Services(new Config(), new Routes());

$routeName = isset($_REQUEST['r']) ? $_REQUEST['r'] : Routes::HOME;

$route = $services->get(Router::class)->find($routeName);
$controller = $route->getClass();
$action = $route->getMethod();

echo (new $controller($services))->$action();
