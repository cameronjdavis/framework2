<?php

namespace Framework2\Rest;

/**
 * A non-existent envelope that consists of the
 * response data with no envelope.
 */
class NoEnvelope implements EnvelopeInterface
{

    /**
     * Return $errors if there are any of $data if no errors
     * @param mixed $data Response data
     * @param mixed $errors Error data
     * @param int $code
     * @return mixed Returns $errors if there are any, or $data if not
     */
    public function putInEnvelope($data, $errors, $code)
    {
        if ($errors) {
            return $errors;
        }

        return $data;
    }
}
