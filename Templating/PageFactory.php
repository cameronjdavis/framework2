<?php

namespace Framework2\Templating;

class PageFactory
{

    private $basePageTemplate;

    public function __construct($basePageTemplate)
    {
        $this->basePageTemplate = $basePageTemplate;
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
        //http_response_code($page->getHttpCode());

        return $this->basePageTemplate;
    }

}
