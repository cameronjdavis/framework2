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
     * @param string $code Short error code. E.g. ERR_001.
     * @param string $message Human-readable message
     */
    public function __construct($code, $message)
    {
        $this->code = $code;
        $this->message = $message;
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
}
