<?php

namespace Framework2\Rest;

/**
 * Provides a method to put response data, errors
 * and response code in an envelope for data transfer.
 */
interface EnvelopeInterface
{

    /**
     * Put the data, errors and code in an envelope object
     * @param mixed $data Response data
     * @param mixed $errors Error data
     * @param int $code Response code
     * @return mixed Envelope object containing response data
     */
    public function putInEnvelope($data, $errors, $code);
}
