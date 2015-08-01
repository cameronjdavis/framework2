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
        $helper = new \Framework2\Authentication\DumbAuthentication('test', $expected);

        $this->assertEquals($expected, $helper->isAuthenticated());
    }

    public function test_getRealm()
    {
        $helper = new \Framework2\Authentication\DumbAuthentication('test', false);

        $this->assertEquals('test', $helper->getRealm());
    }
}