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
    public function get($key, $default = null, $filter = FILTER_DEFAULT, array $options = [])
    {
        $input = filter_input($this->inputType, $key, $filter, $options);

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

    /**
     * Get a bool value from the input
     * @param string $key
     * @param bool $default
     * @return bool
     */
    public function getBool($key, $default = false)
    {
        return $this->get($key, $default, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Get an array from the input
     * @param string $key
     * @param array $default
     * @return array
     */
    public function getArray($key, array $default = [], $filter = FILTER_DEFAULT)
    {
        $array = $this->get($key, $default, $filter, ['flags' => FILTER_REQUIRE_ARRAY]);

        // remove any array elements that did not pass the filter
        return array_filter($array, function($element) {
            // failed elements will be set to FALSE
            return $element !== false;
        });
    }

    /**
     * Get an array of ints from the input
     * @param string $key
     * @param array $default
     * @return array
     */
    public function getIntArray($key, array $default = [])
    {
        return $this->getArray($key, $default, FILTER_VALIDATE_INT, ['flags' => FILTER_REQUIRE_ARRAY]);
    }
}
