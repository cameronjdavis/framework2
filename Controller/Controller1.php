<?php

namespace Framework2\Controller;

use Framework2\Services\Services;
use Framework2\Templating\PageFactory;
use Framework2\Routing\Router;
use Framework2\Routing\Routes;

class Controller1
{
    /**
     * @var PageFactory
     */
    private $pageFactory;

    /**
     * @var Router
     */
    private $router;

    public function __construct(Services $services)
    {
        $this->pageFactory = $services->get(PageFactory::class);
        $this->router = $services->get(Router::class);
    }

    public function home()
    {
        $contact = $this->router->generate(Routes::CONTACT, ['contactId' => 101, 'id2' => 223]);
        $page = $this->pageFactory->create()
                ->setTitle('Title 1')
                ->setBody('body 1 <a href="?r=' . $contact . '">Contact me</a>');

        echo $this->pageFactory->render($page);
    }

    public function contact()
    {
        $routeParam1 = $this->router->getParams()['contactId'];
        $routeParam2 = $this->router->getParams()['id2'];

        $page = $this->pageFactory->create()
                ->setTitle('Contact me')
                ->setBody("Route param 1: {$routeParam1}. Route param 2: {$routeParam2}")
                ->setHttpCode(\Framework2\Templating\Page::HTTP_404);

        echo $this->pageFactory->render($page);
    }
}
