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
        http_response_code($page->getHttpCode());

        // render the template into $output
        ob_start();
        include $this->basePageTemplate;
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }
}
