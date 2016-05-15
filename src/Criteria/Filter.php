<?php

namespace Framework2\Criteria;

/**
 * A Filter uses a Criteria to find and return matching subjects
 * from an array of subjects. It also provides access to
 * non-matching subjects.
 */
class Filter
{
    /**
     * @var MatcherInterface
     */
    private $matcher;

    /**
     * @var array
     */
    private $nonMatches;

    public function __construct(MatcherInterface $matcher)
    {
        $this->matcher = $matcher;
    }

    /**
     * Find and return the single subject that fulfils $criteria.
     * Returns null if no subject found, or more than one.
     * @param array $subjects
     * @param \Framework2\Criteria\Criteria $criteria
     * @return mixed|null The subject or null
     */
    public function filterOne(array $subjects, Criteria $criteria)
    {
        $matches = $this->filter($subjects, $criteria);

        return count($matches) == 1 ? reset($matches) : null;
    }

    /**
     * Find and return the subjects that fulfil the $criteria.
     * @param array $subjects
     * @param \Framework2\Criteria\Criteria $criteria
     * @return array Matching subjects, keys are preserved.
     */
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

    /**
     * Get the subjects that did not fulfil the criteria
     * on the last call of filter().
     * @return array
     */
    public function getNonMatches()
    {
        return $this->nonMatches;
    }
}
