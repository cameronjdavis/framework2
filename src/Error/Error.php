<?php

namespace Framework2\Error;

/**
 * An error consisting of a short error code
 * and a descriptive message.
 */
class Error
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $message;

    /**
     * @var string
     */
    private $field;

    /**
     * @param string $code Short error code. E.g. ERR_001.
     * @param string $message Human-readable message
     * @param string $field Name of the field the error relates to
     */
    public function __construct($code, $message, $field = null)
    {
        $this->code = $code;
        $this->message = $message;
        $this->field = $field;
    }

    /**
     * Get the short error code.
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Get the human-readable message.
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Get the name of the field this error relates to.
     * @return string
     */
    public function getField()
    {
        return $this->field;
    }
}
