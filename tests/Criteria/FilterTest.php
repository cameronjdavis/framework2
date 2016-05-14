<?php

namespace Framework2\Tests\Criteria;

use Framework2\Criteria\Filter as Subject;
use Framework2\Criteria\Criteria;
use Framework2\Criteria\Criterion;

class FilterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Subject
     */
    private $subject;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    private $matcher;

    protected function setUp()
    {
        $this->matcher = $this->getMock(\Framework2\Criteria\MatcherInterface::class);
        $this->subject = new Subject($this->matcher);
    }

    public function test_filterOne()
    {
        $targeter = new \Framework2\Criteria\PropertyTargeter();
        $matcher = new \Framework2\Criteria\Matcher($targeter);
        $this->subject = new Subject($matcher);
        
        $subject1 = new \stdClass();
        $subject1->prop1 = 123;
        $subject2 = new \stdClass();
        $subject2->prop1 = 456;

        $subjects = [$subject1, $subject2];

        $criteria = new Criteria();
        $criteria->and_('prop1', Criterion::EQ, 123);

        $actual = $this->subject->filterOne($subjects, $criteria);

        $this->assertSame($subject1, $actual);
    }
}
