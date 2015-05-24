<?php

require_once('src/routing/Router.php');
require_once('src/helper/TestClass.php');
require_once('src/helper/TestClass2.php');

class Services
{
private $instances;

private $config;

private $routes;

public function __construct(Config $config, Routes $routes)
{
$this->config = $config;
$this->routes = $routes;
}

public function get($key)
{
if(!isset($this->instances[$key]))
{
$this->instances[$key] = $this->create($key);
}

return $this->instances[$key];
}

public function create($key)
{
switch($key)
{
case Router::class:
return new Router($this->routes);
case TestClass::class:
return new TestClass($this->config->settings[Config::TEST_SETTING]);
case TestClass2::class:
return new TestClass2($this->get(TestClass::class));
default:
throw new \Exception("Service ({$key}) could not be created");
}
}
}
