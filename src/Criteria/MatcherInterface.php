<?php

namespace Framework2\Criteria;

/**
 * A MatcherInterface class can assess a subject and
 * return a boolean indicating whether or not the
 * subject fulfils the provided criteria.
 */
interface MatcherInterface
{

    /**
     * Determine if $subject fulfils the $criterion.
     * @param mixed $subject
     * @param \Framework2\Criteria\Criterion $criterion
     * @return boolean True if $subject fulfils the $criterion.
     */
    public function match($subject, Criterion $criterion);

    /**
     * Determine if $subject fulfils the $criteria.
     * @param mixed $subject
     * @param \Framework2\Criteria\Criteria $criteria
     * @return boolean True if $subject fulfils the $criteria.
     */
    public function matchCriteria($subject, Criteria $criteria);
    
    /**
     * Determine if $subject fulfils mulitple $criterions.
     * @param mixed $subject
     * @param \Framework2\Criteria\Criterion[] $criterions
     * @return boolean True if $subject fulfils the $criterion.
     */
    public function matchCriterions($subject, array $criterions);
}
