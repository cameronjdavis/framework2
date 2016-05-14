<?php

namespace Framework2\Criteria;

interface TargetInterface
{

    /**
     * Get the $subject's value for the $target property.
     * @param mixed $subject
     * @param string $target
     * @return mixed
     */
    public function locate($subject, $target);
}
