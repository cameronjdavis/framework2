<?php

namespace Framework2\Templating;

use Framework2\Templating\Renderer;

class PageFactory
{
    private $basePageTemplate;

    /**
     * @var Renderer
     */
    private $renderer;

    public function __construct($basePageTemplate, Renderer $renderer)
    {
        $this->basePageTemplate = $basePageTemplate;
        $this->renderer = $renderer;
    }

    public function setBasePageTemplate($basePageTemplate)
    {
        $this->basePageTemplate = $basePageTemplate;
    }

    public function create()
    {
        return new Page();
    }

    public function render(Page $page)
    {
        http_response_code($page->getHttpCode());

        return $this->renderer->render($this->basePageTemplate, compact('page'));
    }
}
