<?php

namespace Framework2\Criteria;

class Limiter
{

    public function limit(array $subjects, Criteria $criteria)
    {
        if (!$criteria->hasLimit()) {
            return $subjects;
        }

        // slice off the limit amount of elements and preserve keys
        return array_slice($subjects, 0, $criteria->getLimit(), true);
    }
}
