<?php

namespace Framework2\Helper;

/**
 * Access to input values on a given input channel.
 * E.g. INPUT_GET, INPUT_POST et al.
 */
class Input
{
    private $inputType;

    /**
     * @param int $inputType E.g. INPUT_GET et al
     * @see INPUT_GET
     */
    public function __construct($inputType)
    {
        $this->inputType = $inputType;
    }

    /**
     * Get a value from the input
     * @param string $key Name of the input value
     * @param mixed $default Returned if input value is mising or invalid according to $filter
     * @param int $filter E.g. FILTER_DEFAULT
     * @return mixed The input value or the default value
     */
    public function get($key, $default = null, $filter = FILTER_DEFAULT)
    {
        $input = filter_input($this->inputType, $key, $filter);

        // return default if no value specified or if the filter failed
        return $input ? $input : $default;
    }

    /**
     * Get an int value from the input
     * @param string $key
     * @param int $default
     * @return int
     */
    public function getInt($key, $default = null)
    {
        return $this->get($key, $default, FILTER_VALIDATE_INT);
    }
}
