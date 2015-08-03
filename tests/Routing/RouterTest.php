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

    public function test_find_notUsingChannel()
    {
        $route1 = new Route('', '', '', [], ['a channel']);
        $routes = [$route1];

        $this->helper = new Helper($routes);

        $actual = $this->helper->find('', 'a different channel');

        $this->assertNull($actual);
    }

    public function test_find_usingChannel()
    {
        $route1 = new Route('', '', '', [], ['a channel']);
        $routes = [$route1];

        $this->helper = new Helper($routes);

        $actual = $this->helper->find('', 'a channel');

        $this->assertEquals($route1, $actual);
    }

    public function test_find_ignoreChannel()
    {
        $route1 = new Route('def', '', '', [], ['a channel']);
        $routes = [$route1];

        $this->helper = new Helper($routes);

        $actual = $this->helper->find('def');

        $this->assertEquals($route1, $actual);
    }

    public function find()
    {
        return [
            ['', '', []],
            ['', '', []],
            ['abc', 'abc', []],
            ['abc/{anId}', 'abc/12', ['anId' => '\d+']],
        ];
    }

    /**
     * @dataProvider find
     */
    public function test_find($pattern, $completeRoute, $params)
    {
        $route1 = new Route($pattern, '', '', $params);
        $routes = [$route1];

        $this->helper = new Helper($routes);

        $actual = $this->helper->find($completeRoute);

        $this->assertEquals($route1, $actual);
    }

    public function test_find_dontMatchRouteAsSubSctring()
    {
        $route1 = new Route('abc', '', '', []);
        $routes = [$route1];

        $this->helper = new Helper($routes);

        $actual = $this->helper->find('abcdef');

        $this->assertNull($actual);
    }

    public function test_find_setFoundItems()
    {
        $route1 = new Route('abc/{id}', '', '', ['id' => '\d+']);
        $routes = ['key1' => $route1];

        $this->helper = new Helper($routes);

        $this->helper->find('abc/12');

        $this->assertEquals('key1', $this->helper->getRouteKey());
        $this->assertEquals(['id' => 12], $this->helper->getParams());
    }
}