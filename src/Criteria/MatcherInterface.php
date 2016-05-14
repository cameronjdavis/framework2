<?php

namespace Framework2\Criteria;

interface MatcherInterface
{

    public function match($subject, Criterion $criterion);

    public function matchCriteria($subject, Criteria $criteria);
}
