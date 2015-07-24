<?php

namespace Framework2\Error;

/**
 * An in-memory buffer for error messages.
 */
class ErrorBuffer
{
    /**
     * @var Error[]
     */
    private $errors = [];

    /**
     * Add an error to the buffer
     * @param string $code Short error code. E.g. ERR_001.
     * @param string $error Human-readable message
     * @param string $field Name of the field the error relates to
     * @return ErrorBuffer
     */
    public function addError($code, $error, $field = null)
    {
        $this->errors[] = new Error($code, $error, $field);

        return $this;
    }

    /**
     * Get the buffered errors.
     * @return Error[]
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Empty the buffer.
     * @return ErrorBuffer
     */
    public function clean()
    {
        $this->errors = [];

        return $this;
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
