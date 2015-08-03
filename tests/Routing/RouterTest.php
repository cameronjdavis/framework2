<?php

namespace Framework2\Tests\Routing;

use Framework2\Routing\Router as Helper;
use Framework2\Routing\Route;

class RouterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Helper
     */
    private $helper;

    public function test_buildRouteRegex_noParams()
    {
        $this->helper = new Helper([]);

        $route = new Route('pattern1', '', '');

        $actual = $this->helper->buildRouteRegex($route);

        $this->assertEquals('pattern1', $actual);
    }

    public function test_buildRouteRegex_someParams()
    {
        $this->helper = new Helper([]);

        $route = new Route('pattern1/{param1}/{param2}/aaa', '', '',
                ['param1' => '\d+', 'param2' => '\w+']);

        $actual = $this->helper->buildRouteRegex($route);

        $this->assertEquals('pattern1/(\d+)/(\w+)/aaa', $actual);
    }

    public function test_generateFromRoute_withParams()
    {
        $this->helper = new Helper([]);

        $route = new Route('pattern1/{param1}/{param2}/aaa', '', '',
                ['param1' => '\d+', 'param2' => '\w+']);

        $actual = $this->helper->generateFromRoute($route,
                ['param1' => 12, 'param2' => 'abc']);

        $this->assertEquals('pattern1/12/abc/aaa', $actual);
    }

    public function test_generate_proxyCall()
    {
        $route = new Route('pattern1/{param1}/{param2}/aaa', '', '',
                ['param1' => '\d+', 'param2' => '\w+']);

        $this->helper = new Helper(['key1' => $route]);

        $actual = $this->helper->generate('key1',
                ['param1' => 12, 'param2' => 'abc']);

        $this->assertEquals('pattern1/12/abc/aaa', $actual);
    }
}