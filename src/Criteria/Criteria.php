<?php

namespace Framework2\Criteria;

class Criteria
{
    private $sets;

    private $count;

    public function __construct()
    {
        $this->count = 0;
        $this->sets = [];
    }

    /**
     * @return \Framework2\Criteria\Criteria
     */
    public function and_($target, $operator, $value)
    {
        $this->andCriterion(new Criterion($target, $operator, $value));

        return $this;
    }

    /**
     * @return \Framework2\Criteria\Criteria
     */
    public function or_($target, $operator, $value)
    {
        $this->orCriterion(new Criterion($target, $operator, $value));

        return $this;
    }

    /**
     * @param Criterion $criterion
     * @return \Framework2\Criteria\Criteria
     */
    public function andCriterion(Criterion $criterion)
    {
        $this->sets[$this->count][] = $criterion;

        return $this;
    }

    /**
     * @param \Framework2\Criteria\Criterion $criterion
     * @return \Framework2\Criteria\Criteria
     */
    public function orCriterion(Criterion $criterion)
    {
        $this->count++;
        $this->sets[$this->count] = [];
        $this->andCriterion($criterion);

        return $this;
    }

    public function __toString()
    {
        $setStrings = [];

        for ($i = 0; $i <= $this->count; $i++) {
            $setStrings[] = implode(' AND ', $this->sets[$i]);
        }

        return '(' . implode(")\nOR (", $setStrings) . ')';
    }
}
