<?php

namespace Framework2\Tests\Authentication;

use Framework2\Input as Helper;

class InputTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Helper
     */
    private $helper;

    public function test_getInt_invalidInput()
    {
        $this->helper = new Helper(['key' => 'not an int']);

        $actual = $this->helper->getInt('key');

        $this->assertNull($actual);
    }

    public function test_getInt_getInput()
    {
        $this->helper = new Helper(['key' => 23]);

        $actual = $this->helper->getInt('key');

        $this->assertEquals(23, $actual);
    }

    public function test_getInt_getDefault()
    {
        $this->helper = new Helper([]);

        $actual = $this->helper->getInt('key', 23);

        $this->assertEquals(23, $actual);
    }

    public function test_getBool_invalidInput()
    {
        $this->helper = new Helper(['key' => 'not a bool']);

        $actual = $this->helper->getBool('key');

        $this->assertFalse($actual);
    }

    public function getBool_getInput()
    {
        return [
            [0, false],
            [1, true],
            ['1', true],
            [true, true],
            [false, false],
        ];
    }

    /**
     * @dataProvider getBool_getInput
     */
    public function test_getBool_getInput($input, $expected)
    {
        $this->helper = new Helper(['key' => $input]);

        $actual = $this->helper->getBool('key');

        $this->assertSame($expected, $actual);
    }

    public function test_getBool_getDefault()
    {
        $this->helper = new Helper([]);

        $actual = $this->helper->getBool('key', true);

        $this->assertTrue($actual);
    }

    public function test_getIntArray_invalidInput()
    {
        $this->helper = new Helper(['key' => 'not an int array']);

        $actual = $this->helper->getIntArray('key');

        $this->assertSame([], $actual);
    }

    public function test_getIntArray_getInput()
    {
        $this->helper = new Helper(['key' => [23, 24]]);

        $actual = $this->helper->getIntArray('key');

        $this->assertEquals([23, 24], $actual);
    }

    public function test_getIntArray_getDefault()
    {
        $this->helper = new Helper([]);

        $actual = $this->helper->getIntArray('key', [23, 24]);

        $this->assertEquals([23, 24], $actual);
    }

    public function test_getArray_invalidInput()
    {
        $this->helper = new Helper(['key' => 'not an array']);

        $actual = $this->helper->getArray('key');

        $this->assertSame([], $actual);
    }

    public function test_getArray_getInput()
    {
        $this->helper = new Helper(['key' => ['abc', 24]]);

        $actual = $this->helper->getArray('key');

        $this->assertEquals(['abc', 24], $actual);
    }

    public function test_getArray_getDefault()
    {
        $this->helper = new Helper([]);

        $actual = $this->helper->getArray('key', ['abc', 24]);

        $this->assertEquals(['abc', 24], $actual);
    }
}