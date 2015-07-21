<?php

namespace Framework2\Rest;

use Framework2\Error\ErrorBuffer;

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
            // override the response with the errors
            $code = 400;

            $data = new \stdClass();
            foreach ($this->errors->getErrors() as $error) {
                $jsonError = new \stdClass();
                $jsonError->code = $error->getCode();
                $jsonError->message = $error->getMessage();
                $data->errors[] = $jsonError;
            }
        }

        http_response_code($code);
        header('Content-Type: application/json');
        echo json_encode($data, JSON_PRETTY_PRINT);
    }
}
