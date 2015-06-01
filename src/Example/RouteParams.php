<?php

namespace Framework2\Example;

use Framework2\Services\Services;
use Framework2\Templating\PageBuilder;
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
     * @var PageBuilder
     */
    private $pageBuilder;

    public function __construct(Services $services)
    {
        $this->router = $services->get(Router::class);
        $this->pageBuilder = $services->get(PageBuilder::class);
    }

    public function useRouteParams()
    {
        $intParam = $this->router->getParams()['intParam'];
        $param2 = $this->router->getParams()['param2'];
        
        $generated = $this->router->generate(\ExampleRoutes::ROUTE_PARAMS, ['intParam' => 666, 'param2' => 'p2']);

        $page = $this->pageBuilder->create()
                ->setBody("<h1>Example route parameters</h1>
                           <ul>
                            <li>intParam: {$intParam}</li>
                            <li>param2: {$param2}</li>
                            <li>Generated route <a href=\"?r={$generated}\">$generated</a></li>
                           </ul>
                           <p>Controller action was <em>" . __METHOD__ . "();</em></p>");

        echo $this->pageBuilder->render($page);
    }
}
