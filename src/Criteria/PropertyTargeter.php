<?php

namespace Framework2\Criteria;

class PropertyTargeter implements TargeterInterface
{

    public function locate($subject, $target)
    {
        return $subject->$target;
    }
}
