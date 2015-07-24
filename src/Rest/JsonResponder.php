<?php

namespace Framework2\Rest;

use Framework2\Error\ErrorBuffer;
use Framework2\Error\ErrorFormatter;

/**
 * Render a JSON HTTP response.
 */
class JsonResponder
{
    const ENVELOPE = 'envelope';
    /**
     * @var ErrorBuffer
     */
    private $errors;

    /**
     * @var bool
     */
    private $useEnvelope;

    /**
     * @var EnvelopeInterface
     */
    private $envelope;

    /**
     * @var ErrorFormatter
     */
    private $formatter;

    /**
     * @param ErrorBuffer $errors
     * @param bool $useEnvelope If true, put response in an envelope
     * @param EnvelopeInterface $envelope
     */
    public function __construct(ErrorBuffer $errors, $useEnvelope,
            EnvelopeInterface $envelope, ErrorFormatter $formatter)
    {
        $this->errors = $errors;
        $this->useEnvelope = $useEnvelope;
        $this->envelope = $envelope;
        $this->formatter = $formatter;
    }

    /**
     * Respond with JSON-encoded $data or JSON-encoded
     * errors if there are any.
     * @param mixed $data Data to be rendered
     * @param int $code HTTP response code
     */
    public function respond($data, $code = 200)
    {
        $errors = null;

        // if any errors have been recorded
        if ($this->errors->hasErrors()) {
            // override the response with the errors
            $code = 400;
            $errors = $this->formatter->formatErrors($this->errors->getErrors());
        }

        $response = $this->envelope->putInEnvelope($data, $errors, $code);

        // when using an envelope always respond with 200
        http_response_code($this->useEnvelope ? 200 : $code);
        header('Content-Type: application/json');
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
}
