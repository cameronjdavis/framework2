<?php

namespace Framework2\Tests\Authentication;

use Framework2\Services as Helper;

class ServicesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Helper
     */
    private $helper;

    public function test_create_callsCallback()
    {
        $services = ['key' => function($config, Helper $s) {
                return 'a service';
            }];

        $this->helper = new Helper([], $services, []);

        $actual = $this->helper->create('key');

        $this->assertEquals('a service', $actual);
    }

    public function test_get_createsService()
    {
        $services = ['key' => function($config, Helper $s) {
                return 'a service';
            }];

        $this->helper = new Helper([], $services, []);

        $actual = $this->helper->get('key');

        $this->assertEquals('a service', $actual);
    }

    public function test_get_onlyCreateOneInstance()
    {
        // create an expectation to only call a method once
        $mock = $this->getMockBuilder(\stdClass::class)
                ->setMethods(['testMethod'])
                ->getMock();
        $mock->expects($this->once())->method('testMethod');

        $services = ['key' => function($config, Helper $s) {
                // call the mocked method
                $config['mock']->testMethod();

                // return the mocked object
                return $config['mock'];
            }];

        $config = ['mock' => $mock];

        $this->helper = new Helper($config, $services, []);

        // get the service twice, testMethod() should only be called once
        $this->helper->get('key');
        $this->helper->get('key');
    }

    public function test_getRoutes()
    {
        $routes = [1];
        $this->helper = new Helper([], [], $routes);

        $this->assertEquals($routes, $this->helper->getRoutes());
    }
}
