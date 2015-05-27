<?php

namespace Framework2\Controller;

use Framework2\Services;
use Framework2\Templating\PageFactory;

class Controller1
{

    /**
     * @var PageFactory
     */
    private $pageFactory;

    public function __construct(Services $services)
    {
        $this->pageFactory = $services->get(PageFactory::class);
    }

    public function home()
    {
        $page = $this->pageFactory->create()
                ->setTitle('Title 1')
                ->setBody('body 1 <a href="?r=' . \Framework2\Routes::CONTACT . '">Contact me</a>');

        echo $this->pageFactory->render($page);
    }

    public function contact()
    {
        $page = $this->pageFactory->create()
                ->setTitle('Contact me')
                ->setBody('Contact me page')
                ->setHttpCode(\Framework2\Templating\Page::HTTP_404);

        echo $this->pageFactory->render($page);
    }

}
