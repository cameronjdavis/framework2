<?php

namespace Framework2\Controller;

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

    public function __construct(PageBuilder $pageBuilder, Renderer $renderer)
    {
        $this->pageBuilder = $pageBuilder;
        $this->renderer = $renderer;
    }

    public function home()
    {
        $fragment = $this->renderer->render('../src/Example/index.html.php');

        $page = $this->pageBuilder->create()
                ->setTitle('Framework 2 Quick Start Guide')
                ->setBody($fragment . "<p>Controller action was <em>" . __METHOD__ . "();</em></p>")
                ->addHeadContent('<link rel="stylesheet" type="text/css" href="index_style.css">');

        echo $this->pageBuilder->render($page);
    }
}
