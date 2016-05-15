<?php

namespace Framework2\Tests\Criteria;

use Framework2\Criteria\Matcher as Subject;
use Framework2\Criteria\Criterion;
use Framework2\Criteria\Criteria;

class MatcherTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Subject
     */
    private $subject;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    private $locater;

    protected function setUp()
    {
        $this->locater = $this->getMock(\Framework2\Criteria\TargetInterface::class);
        $this->subject = new Subject($this->locater);
    }

    public function match()
    {
        return [
            [Criterion::EQ, 123, 123, true],
            [Criterion::EQ, 123, 456, false],
            [Criterion::GT, 123, 123, false],
            [Criterion::GT, 123, 456, false],
            [Criterion::GT, 456, 123, true],
            [Criterion::GTE, 123, 456, false],
            [Criterion::GTE, 123, 123, true],
            [Criterion::GTE, 456, 123, true],
            [Criterion::IN, 2, [], false],
            [Criterion::IN, 2, [2], true],
            [Criterion::IN, 2, [2, 3], true],
            [Criterion::LT, 456, 123, false],
            [Criterion::LT, 123, 123, false],
            [Criterion::LT, 123, 456, true],
            [Criterion::LTE, 123, 456, true],
            [Criterion::LTE, 123, 123, true],
            [Criterion::LTE, 456, 123, false],
            [Criterion::NOT_EQ, 456, 123, true],
            [Criterion::NOT_EQ, 456, 456, false],
            [Criterion::NOT_IN, 2, [], true],
            [Criterion::NOT_IN, 2, [2], false],
            [Criterion::NOT_IN, 2, [2, 3], false],
        ];
    }

    /**
     * @dataProvider match
     */
    public function test_match($operator, $actualVal, $targetVal, $expected)
    {
        $subject = new \stdClass();
        $criterion = new Criterion('prop1', $operator, $targetVal);

        $this->locater->expects($this->once())->method('locate')->with($subject,
                $criterion->getTarget())->will($this->returnValue($actualVal));

        $actual = $this->subject->match($subject, $criterion);

        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @dataProvider match
     */
    public function test_matchCriteria($operator, $actualVal, $targetVal, $expected)
    {
        $subject = new \stdClass();
        $criterion = new Criterion('prop1', $operator, $targetVal);
        $criteria = (new Criteria())->andCriterion($criterion);

        $this->locater->expects($this->once())->method('locate')->with($subject,
                $criterion->getTarget())->will($this->returnValue($actualVal));

        $actual = $this->subject->matchCriteria($subject, $criteria);

        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @dataProvider match
     */
    public function test_matchCriterions($operator, $actualVal, $targetVal, $expected)
    {
        $subject = new \stdClass();
        $criterion = new Criterion('prop1', $operator, $targetVal);

        $this->locater->expects($this->once())->method('locate')->with($subject,
                $criterion->getTarget())->will($this->returnValue($actualVal));

        $actual = $this->subject->matchCriterions($subject, [$criterion]);

        $this->assertEquals($expected, $actual);
    }
}
