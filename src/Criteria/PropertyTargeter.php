<?php

namespace Framework2\Criteria;

class PropertyTargeter implements TargetInterface
{

    public function locate($subject, $target)
    {
        return $subject->$target;
    }
}
