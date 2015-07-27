<?php

namespace Framework2\Error;

/**
 * Convert one or more Error objects into simple stdClass
 * objects so they are ready for JSON encoding with json_encode().
 */
class ErrorFormatter
{

    /**
     * Format the error ready for JSON encoding.
     * @param Error $error
     * @return \stdClass Error formatted for JSON encoding
     */
    public function format(Error $error)
    {
        $formatted = new \stdClass();

        $formatted->code = $error->getCode();

        // only add the field if it is set
        if ($error->getField()) {
            $formatted->field = $error->getField();
        }

        $formatted->message = $error->getMessage();

        return $formatted;
    }

    /**
     * Format multiple errors ready for JSON encoding.
     * @param array $errors
     * @return \stdClass[] Formatted errors
     */
    public function formatErrors(array $errors)
    {
        $formatted = [];

        foreach ($errors as $error) {
            $formatted[] = $this->format($error);
        }

        return $formatted;
    }
}
