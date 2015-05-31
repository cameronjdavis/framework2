<?php

namespace Framework2\Controller;

use Framework2\Services\Services;
use Framework2\Templating\PageFactory;
use Framework2\Templating\Renderer;

class Index
{
    /**
     * @var PageFactory
     */
    private $pageFactory;

    /**
     * @var Renderer
     */
    private $renderer;

    public function __construct(Services $services)
    {
        $this->pageFactory = $services->get(PageFactory::class);
        $this->renderer = $services->get(Renderer::class);
    }

    public function home()
    {
        $fragment = $this->renderer->render('../src/Example/index.html.php');

        $page = $this->pageFactory->create()
                ->setTitle('Framework 2 Quick Start Guide')
                ->setBody($fragment . "<p>Controller action was <em>" . __METHOD__ . "();</em></p>");

        echo $this->pageFactory->render($page);
    }
}
