<?php

namespace Framework2\Controller;

use Framework2\Services\Services;
use Framework2\Templating\PageBuilder;
use Framework2\Templating\Renderer;

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

    public function __construct(Services $services)
    {
        $this->pageBuilder = $services->get(PageBuilder::class);
        $this->renderer = $services->get(Renderer::class);
    }

    public function home()
    {
        $fragment = $this->renderer->render('../src/Example/index.html.php');

        $page = $this->pageBuilder->create()
                ->setTitle('Framework 2 Quick Start Guide')
                ->setBody($fragment . "<p>Controller action was <em>" . __METHOD__ . "();</em></p>");

        echo $this->pageBuilder->render($page);
    }
}
