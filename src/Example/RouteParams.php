<?php

namespace Framework2\Example;

use Framework2\Templating\PageBuilder;
use Framework2\Routing\Router;
use Framework2\Input;

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

    /**
     * @var Input
     */
    private $routeParams;

    public function __construct(Router $router, PageBuilder $pageBuilder, Input $routeParams)
    {
        $this->router = $router;
        $this->pageBuilder = $pageBuilder;
        $this->routeParams = $routeParams;
    }

    public function useRouteParams()
    {
        $intParam = $this->routeParams->getInt('intParam');
        $param2 = $this->routeParams->get('param2');

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
