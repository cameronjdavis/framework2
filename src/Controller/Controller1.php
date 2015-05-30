<?php

namespace Framework2\Controller;

use Framework2\Services\Services;
use Framework2\Templating\PageFactory;
use Framework2\Routing\Router;
use Framework2\Example\ExampleParamConverter;
use Framework2\Templating\Renderer;

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

    /**
     * @var \Framework2\Helper\Input
     */
    private $query;

    /**
     * @var ExampleParamConverter
     */
    private $paramConverter;

    /**
     * @var Renderer
     */
    private $renderer;

    public function __construct(Services $services)
    {
        $this->pageFactory = $services->get(PageFactory::class);
        $this->router = $services->get(Router::class);
        $this->query = $services->get(\ServiceFactory::QUERY);
        $this->paramConverter = $services->get(ExampleParamConverter::class);
        $this->renderer = $services->get(Renderer::class);
    }

    public function home()
    {
        $contact = $this->router->generate(\Routes::CONTACT, ['contactId' => 101, 'id2' => 223]);
        $page = $this->pageFactory->create()
                ->setTitle('Title 1')
                ->setBody('body 1 <a href="?r=' . $contact . '">Contact me</a>');

        echo $this->pageFactory->render($page);
    }

    public function contact()
    {
        $contact = $this->router->generate(\Routes::CONTACT, ['contactId' => 44, 'id2' => 87]);

        $exampleClass = $this->paramConverter->build();

        $fragment = $this->renderer->render('../template/contact.html.php', compact('contact', 'exampleClass'));

        $page = $this->pageFactory->create()
                ->setTitle('Contact me')
                ->setBody($fragment)
                ->setHttpCode(\Framework2\Templating\Page::HTTP_404)
                ->addHeadContent('<link rel="stylesheet" type="text/css" href="contact_style.css">');

        echo $this->pageFactory->render($page);
    }
}
