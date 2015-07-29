<?php

namespace Framework2\Tests\Rest;

class DumbAuthenticationTest extends \PHPUnit_Framework_TestCase
{

    public function isAuthenticated()
    {
        return [
            [true],
            [false],
        ];
    }

    /**
     * @dataProvider isAuthenticated
     */
    public function test_isAuthenticated($expected)
    {
        $helper = new \Framework2\Rest\DumbAuthentication('test', $expected);

        $this->assertEquals($expected, $helper->isAuthenticated());
    }
}