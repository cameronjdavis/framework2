<?php

namespace Framework2\Rest;

/**
 * Put data in a standard envelope structure.
 */
class Envelope implements EnvelopeInterface
{

    /**
     * Put the response in an envelope and return.
     * @param mixed $data Response data
     * @param mixed $errors Error data
     * @param int $code
     * @return \stdClass Envelope object filled with response
     */
    public function putInEnvelope($data, $errors, $code)
    {
        $envelope = new \stdClass();
        $envelope->code = $code;

        // include errors if there are any
        // otherwise include the data
        if ($errors) {
            $envelope->errors = $errors;
        } else {
            $envelope->data = $data;
        }

        return $envelope;
    }
}
