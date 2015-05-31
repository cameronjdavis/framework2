<?php

namespace Framework2\Example;

use Framework2\Services\Services;
use Framework2\Templating\PageFactory;
use Framework2\Routing\Router;

/**
 * Controller that demonstrates use of route parameters.
 */
class RouteParams
{
    /**
     * @var Router
     */
    private $router;
    
    /**
     * @var PageFactory
     */
    private $pageFactory;

    public function __construct(Services $services)
    {
        $this->router = $services->get(Router::class);
        $this->pageFactory = $services->get(PageFactory::class);
    }

    public function useRouteParams()
    {
        $intParam = $this->router->getParams()['intParam'];
        $param2 = $this->router->getParams()['param2'];

        $page = $this->pageFactory->create()
                ->setBody("<h1>Example route parameters</h1>
                           <ul>
                            <li>intParam: {$intParam}</li>
                            <li>param2: {$param2}</li>
                           </ul>
                           <p>Controller action was <em>" . __METHOD__ . "();</em></p>");

        echo $this->pageFactory->render($page);
    }
}
