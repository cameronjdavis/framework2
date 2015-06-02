<?php

namespace Framework2\Controller;

use Framework2\Services;
use Framework2\Templating\PageBuilder;
use Framework2\Templating\Renderer;
use Framework2\Response\HttpResponseBuilder;
use Framework2\Response\HttpResponse;

class Index
{
    /**
     * @var PageBuilder
     */
    private $pageBuilder;

    /**
     * @var Renderer
     */
    private $renderer;

    /**
     * @var HttpResponseBuilder
     */
    private $responseBuilder;

    public function __construct(Services $services)
    {
        $this->pageBuilder = $services->get(PageBuilder::class);
        $this->renderer = $services->get(Renderer::class);
        $this->responseBuilder = $services->get(HttpResponseBuilder::class);
    }

    public function home()
    {
        $fragment = $this->renderer->render('../src/Example/index.html.php');

        $page = $this->pageBuilder->create()
                ->setTitle('Framework 2 Quick Start Guide')
                ->setBody($fragment . "<p>Controller action was <em>" . __METHOD__ . "();</em></p>")
                ->addHeadContent('<link rel="stylesheet" type="text/css" href="index_style.css">');

        $response = $this->responseBuilder->createResponse()
                ->setContent($this->pageBuilder->render($page))
                ->setHttpCode(HttpResponse::HTTP_403)
                ->addHeader('MyHeader', 'header_value_1');

        $this->responseBuilder->render($response);
    }
}
