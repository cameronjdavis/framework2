<?php

namespace Framework2\Criteria;

/**
 * A criterion applies to a specific target, e.g. $user->getId().
 * The value of the target comes from a subject.
 * A TargeterInterface object can locate the target value from a subject.
 */
interface TargeterInterface
{

    /**
     * Get the $subject's value for the $target property.
     * @param mixed $subject
     * @param string $target
     * @return mixed
     */
    public function locate($subject, $target);
}
