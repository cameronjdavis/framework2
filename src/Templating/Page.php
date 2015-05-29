<?php

namespace Framework2\Templating;

class Page
{

    const HTTP_200 = 200;
    const HTTP_404 = 404;

    private $httpCode;
    private $title;
    private $body;

    public function __construct()
    {
        $this->httpCode = self::HTTP_200;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    public function getHttpCode()
    {
        return $this->httpCode;
    }

    public function setHttpCode($code)
    {
        $this->httpCode = $code;

        return $this;
    }

}
