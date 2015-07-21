<?php

namespace Framework2\Rest;

use Framework2\ErrorBuffer;

/**
 * Render a JSON HTTP response.
 */
class JsonResponder
{
    /**
     * @var ErrorBuffer
     */
    private $errors;

    /**
     * @param ErrorBuffer $errors
     */
    public function __construct(ErrorBuffer $errors)
    {
        $this->errors = $errors;
    }

    /**
     * Respond with JSON-encoded $data or JSON-encoded
     * errors if there are any.
     * @param mixed $data Data to be rendered
     * @param int $code HTTP response code
     */
    public function respond($data, $code = 200)
    {
        // if any errors have been recorded
        if ($this->errors->hasErrors()) {
            $errors = new \stdClass();
            $errors->erorrs = $this->errors->getErrors();
            // override the response with the errors
            $data = $errors;
            $code = 400;
        }

        http_response_code($code);
        header('Content-Type: application/json');
        echo json_encode($data, JSON_PRETTY_PRINT);
    }
}
