<?php

namespace Framework2\Criteria;

class Filter
{
    /**
     * @var MatcherInterface
     */
    private $matcher;

    private $nonMatches;

    public function __construct(MatcherInterface $matcher)
    {
        $this->matcher = $matcher;
    }

    public function filterOne(array $subjects, Criteria $criteria)
    {
        $matches = $this->filter($subjects, $criteria);

        return count($matches) == 1 ? reset($matches) : null;
    }

    public function filter(array $subjects, Criteria $criteria)
    {
        $matches = [];
        $this->nonMatches = [];

        foreach ($subjects as $key => $subject) {
            if ($this->matcher->matchCriteria($subject, $criteria)) {
                $matches[$key] = $subject;
                continue;
            }

            $this->nonMatches[$key] = $subject;
        }

        return $matches;
    }

    public function getNonMatches()
    {
        return $this->nonMatches;
    }
}
