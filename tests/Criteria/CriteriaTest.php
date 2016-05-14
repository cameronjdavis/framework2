<?php

namespace Framework2\Tests\Criteria;

use Framework2\Criteria\Criteria as Subject;
use Framework2\Criteria\Criterion;

class CriteriaTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Subject
     */
    private $subject;

    protected function setUp()
    {
        $this->subject = new Subject();
    }

    public function test_usage()
    {
        $this->subject->and_('target1', Criterion::EQ, 3)
                ->and_('target2', Criterion::IN, [1, 2, 3])
                ->or_('target1', Criterion::GT, 12)
                ->and_('target2', Criterion::NOT_IN, [1, 2, 3])
                ->or_('target3', Criterion::NOT_EQ, 'aValue')
                ->orCriterion(new Criterion('target4', Criterion::EQ, 'abc'))
                ->andCriterion(new Criterion('target5', Criterion::EQ, 'def'))
                ->andCriterion(new Criterion('target6', Criterion::EQ, 'def'))
                ->andCriterion(new Criterion('target7', Criterion::EQ, 'def'))
                ->andCriterion(new Criterion('target8', Criterion::EQ, 'def'));

        echo (string)$this->subject;
    }
}
