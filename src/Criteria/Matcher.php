<?php

namespace Framework2\Criteria;

class Matcher implements MatcherInterface
{
    /**
     * @var TargetInterface
     */
    private $targeter;

    public function __construct(TargetInterface $targeter)
    {
        $this->targeter = $targeter;
    }

    /**
     * @param mixed $subject
     * @param \Framework2\Criteria\Criterion $criterion
     * @return boolean
     */
    public function match($subject, Criterion $criterion)
    {
        $value = $this->targeter->locate($subject, $criterion->getTarget());

        switch ($criterion->getOperator()) {
            case Criterion::EQ:
                return $value == $criterion->getValue();
            case Criterion::GT:
                return $value > $criterion->getValue();
            case Criterion::GTE:
                return $value >= $criterion->getValue();
            case Criterion::IN:
                return in_array($value, $criterion->getValue());
            case Criterion::LT:
                return $value < $criterion->getValue();
            case Criterion::LTE:
                return $value <= $criterion->getValue();
            case Criterion::NOT_EQ:
                return $value != $criterion->getValue();
            case Criterion::NOT_IN:
                return !in_array($value, $criterion->getValue());
        }
    }

    /**
     * @param mixed $subject
     * @param \Framework2\Criteria\Criteria $criteria
     * @return boolean
     */
    public function matchCriteria($subject, Criteria $criteria)
    {
        $result = true;
        
        foreach ($criteria as $criterions) {
            $result = $result && $this->matchCriterions($subject, $criterions);
        }

        return $result;
    }

    public function matchCriterions($subject, array $criterions)
    {
        foreach ($criterions as $criterion) {
            if (!$this->match($subject, $criterion)) {
                return false;
            }
        }

        return true;
    }
}
