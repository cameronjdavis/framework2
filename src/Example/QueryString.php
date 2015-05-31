<?php

namespace Framework2\Example;

use Framework2\Services\Services;
use Framework2\Helper\Input;
use Framework2\Templating\PageFactory;

/**
 * Controller that demonstrates use of query string input.
 */
class QueryString
{
    /**
     * @var Input
     */
    private $query;

    /**
     * @var PageFactory
     */
    private $pageFactory;

    public function __construct(Services $services)
    {
        $this->query = $services->get(Services::QUERY);
        $this->pageFactory = $services->get(PageFactory::class);
    }

    public function queryValues()
    {
        $stringVal = $this->query->get('stringVal', 'default value');
        $intVal = $this->query->getInt('intVal', 99);
        $boolVal = $this->query->getBool('boolVal');

        // render the print_r into a variable
        ob_start();
        print_r($this->query->getArray('arrayVal'));
        $arrayVal = ob_get_contents();
        ob_end_clean();

        $page = $this->pageFactory->create()
                ->setBody("<h1>Example query value inputs</h1>
                           <ul>
                            <li>stringVal: {$stringVal}</li>
                            <li>intVal: {$intVal}</li>
                            <li>boolVal: {$boolVal}</li>
                            <li>arrayVal: {$arrayVal}</li>
                           </ul>
                           <p>Page rendered in <em>" . __METHOD__ . "();</em></p>");

        echo $this->pageFactory->render($page);
    }
}
