<?php

namespace Framework2;

/**
 * A buffer for error messages.
 */
class ErrorBuffer
{
    /**
     * @var string[]
     */
    private $errors = [];

    /**
     * Add an error to the buffer
     * @param string $code Short error code. E.g. ERR_001.
     * @param string $error Human-readable message
     * @return ErrorBuffer
     */
    public function addError($code, $error)
    {
        $this->errors[$code] = $error;

        return $this;
    }

    /**
     * Get the buffered errors.
     * @return string[]
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Empty the buffer.
     */
    public function clean()
    {
        $this->errors = [];
    }

    /**
     * Are there any errors?
     * @return bool
     */
    public function hasErrors()
    {
        return count($this->errors) > 0;
    }
}
