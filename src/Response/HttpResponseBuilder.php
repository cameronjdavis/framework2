<?php

namespace Framework2\Response;

class HttpResponseBuilder
{

    /**
     * Construct and return a new HttpResponse.
     * @return HttpResponse
     */
    public function createResponse()
    {
        return new HttpResponse();
    }

    /**
     * Construct and return a HttpResponse
     * configured for JSON.
     * @return HttpResponse
     */
    public function createJsonResponse()
    {
        return $this->createResponse()
                        ->addHeader('TODO', 'TODO');
    }

    /**
     * Send the HTTP response code, send headers
     * and echo the response content.
     * @param HttpResponse $response
     */
    public function render(HttpResponse $response)
    {
        http_response_code($response->getHttpCode());

        foreach ($response->getHeaders() as $key => $value) {
            header("{$key}: {$value}");
        }

        echo $response->getContent();
    }
}
