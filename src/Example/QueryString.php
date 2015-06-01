<?php

namespace Framework2\Example;

use Framework2\Services;
use Framework2\Input;
use Framework2\Templating\PageBuilder;

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
     * @var PageBuilder
     */
    private $pageBuilder;

    public function __construct(Services $services)
    {
        $this->query = $services->get(\Service::QUERY);
        $this->pageBuilder = $services->get(PageBuilder::class);
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

        $page = $this->pageBuilder->create()
                ->setBody("<h1>Example query value inputs</h1>
                           <ul>
                            <li>stringVal: {$stringVal}</li>
                            <li>intVal: {$intVal}</li>
                            <li>boolVal: {$boolVal}</li>
                            <li>arrayVal: {$arrayVal}</li>
                           </ul>
                           <p>Controller action was <em>" . __METHOD__ . "();</em></p>");

        echo $this->pageBuilder->render($page);
    }
}
