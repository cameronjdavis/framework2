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
    public function respond($data, $code = Http::OK)
    {
        $errors = null;

        // if any errors have been recorded
        if ($this->errors->hasErrors()) {
            // override the response with the errors
            $code = Http::UNPROCESSABLE_ENTITY;
            $errors = $this->formatter->formatErrors($this->errors->getErrors());
        }

        $response = $this->envelope->putInEnvelope($data, $errors, $code);

        // when using an envelope always respond with 200
        http_response_code($this->useEnvelope ? Http::OK : $code);
        header('Content-Type: application/json');

        // if repsonse is null, send nothing so the response is truly empty
        if ($response !== null) {
            echo json_encode($response, JSON_PRETTY_PRINT);
        }
    }

    /**
     * Respond to indicate failure of authentication.
     * @param string $realm HTTP basic auth realm
     */
    public function respondToNotAuthenticated($realm)
    {
        http_response_code(Http::NOT_AUTHENTICATED);
        header("WWW-Authenticate: Basic realm=\"{$realm}\"");
    }
}