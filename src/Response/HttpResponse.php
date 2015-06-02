<?php

namespace Framework2\Response;

class HttpResponse
{
    const HTTP_200 = 200;
    const HTTP_403 = 403;
    const HTTP_404 = 404;
    /**
     * @var int
     */
    private $httpCode;

    /**
     * @var string
     */
    private $content;

    /**
     * @var array
     */
    private $headers;

    public function __construct($httpCode = self::HTTP_200)
    {
        $this->httpCode = $httpCode;
        $this->headers = [];
    }

    /**
     * Get the HTTP response code
     * @return int
     */
    public function getHttpCode()
    {
        return $this->httpCode;
    }

    /**
     * Set the HTTP response code
     * @param int $code
     * @return \Framework2\HttpResponse
     * @see self::HTTP_200
     */
    public function setHttpCode($code)
    {
        $this->httpCode = $code;

        return $this;
    }

    /**
     * Get the content of this response
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the content of this response
     * @param string $content
     * @return HttpResponse
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Add a header to the response
     * E.g. "Location: http://www.example.com/"
     * @param string $key E.g. "Location".
     * @param string $value E.g. "http://www.example.com/".
     * @return HttpResponse
     */
    public function addHeader($key, $value)
    {
        $this->headers[$key] = $value;

        return $this;
    }

    /**
     * Get this response's headers as a key-value array.
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }
}
