<?php

namespace Framework2\Tests\Criteria;

use Framework2\Criteria\Limiter as Subject;
use Framework2\Criteria\Criteria;

class LimiterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Subject
     */
    private $subject;

    protected function setUp()
    {
        $this->subject = new Subject();
    }

    public function test_limit_noLimit()
    {
        $subjects = [1, 2, 3];
        $criteria = new Criteria();

        $actual = $this->subject->limit($subjects, $criteria);

        $this->assertEquals($subjects, $actual);
    }

    public function test_limit_hasLimit()
    {
        $subjects = [1, 2, 3];
        $criteria = (new Criteria())->setLimit(2);

        $actual = $this->subject->limit($subjects, $criteria);

        $this->assertEquals([1, 2], $actual);
    }

    public function test_limit_preserveKeys()
    {
        $subjects = ['key1' => 33];
        $criteria = (new Criteria())->setLimit(2);

        $actual = $this->subject->limit($subjects, $criteria);

        $this->assertArrayHasKey('key1', $actual);
        $this->assertEquals(1, count($actual));
        $this->assertEquals(33, $actual['key1']);
    }
}
