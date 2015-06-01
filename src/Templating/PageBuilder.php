<?php

namespace Framework2\Templating;

use Framework2\Templating\Renderer;

/**
 * Create new pages and render them with a template.
 */
class PageBuilder
{
    /**
     * @var string
     */
    private $template;

    /**
     * @var Renderer
     */
    private $renderer;

    /**
     * @param string $template Path to the page template file
     * @param Renderer $renderer
     */
    public function __construct($template, Renderer $renderer)
    {
        $this->template = $template;
        $this->renderer = $renderer;
    }

    /**
     * Construct and return a new page.
     * @return \Framework2\Templating\Page
     */
    public function create()
    {
        return new Page();
    }

    /**
     * Render the template using $page and return the rendered page.
     * @param \Framework2\Templating\Page $page
     * @return string
     */
    public function render(Page $page)
    {
        http_response_code($page->getHttpCode());

        return $this->renderer->render($this->template, compact('page'));
    }
}
