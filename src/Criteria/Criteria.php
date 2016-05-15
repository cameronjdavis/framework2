<?php

namespace Framework2\Criteria;

/**
 * A Criteria is multiple sets of Criterion
 * logically joined by AND and OR.
 */
class Criteria implements \Iterator
{
    private $andGroups;

    private $count;

    public function __construct()
    {
        $this->count = 0;
        $this->andGroups = [];
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
        $this->andGroups[$this->count][] = $criterion;

        return $this;
    }

    /**
     * @param \Framework2\Criteria\Criterion $criterion
     * @return \Framework2\Criteria\Criteria
     */
    public function orCriterion(Criterion $criterion)
    {
        $this->count++;
        $this->andGroups[$this->count] = [];
        $this->andCriterion($criterion);

        return $this;
    }

    public function __toString()
    {
        $setStrings = [];

        for ($i = 0; $i <= $this->count; $i++) {
            $setStrings[] = implode(' AND ', $this->andGroups[$i]);
        }

        return '(' . implode(")\nOR (", $setStrings) . ')';
    }

    public function current()
    {
        return current($this->andGroups);
    }

    public function key()
    {
        return key($this->andGroups);
    }

    public function next()
    {
        return next($this->andGroups);
    }

    public function rewind()
    {
        reset($this->andGroups);
    }

    public function valid()
    {
        $key = key($this->andGroups);

        return $key !== null && $key !== false;
    }
}
