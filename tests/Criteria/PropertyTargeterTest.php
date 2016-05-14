<?php

namespace Framework2\Tests\Criteria;

use Framework2\Criteria\PropertyTargeter as Subject;

class PropertyTargeterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Subject
     */
    private $subject;

    protected function setUp()
    {
        $this->subject = new Subject();
    }

    public function test_locate()
    {
        $subject = new \stdClass();
        $subject->prop1 = 123;

        $actual = $this->subject->locate($subject, 'prop1');

        $this->assertEquals(123, $actual);
    }
}
