<?php

namespace Framework2\Example;

use Framework2\Console\Routing;
use Framework2\Templating\PageBuilder;
use Framework2\Console\Config;

class Console
{
    /**
     * @var Routing
     */
    private $routes;

    /**
     * @var PageBuilder
     */
    private $pageBuilder;

    /**
     * @var Config
     */
    private $config;

    public function __construct(Routing $routes, PageBuilder $pageBuilder,
            Config $config)
    {
        $this->routes = $routes;
        $this->pageBuilder = $pageBuilder;
        $this->config = $config;
    }

    public function showExample()
    {
        ob_start();
        $this->routes->listRoutes();
        $output1 = ob_get_clean();

        ob_start();
        $this->config->listConfig();
        $output2 = ob_get_clean();

        $page = $this->pageBuilder->create()
                ->setTitle('Console usage')
                ->setBody("<h1>Console usage</h1>
                        <p>A console-based entry point to the framework is available. Run these commands from <code>" . ROOT . "</code>.</p>
                        <p style='font-weight: bold; font-size: x-large'><code>$ ./console " . \ConsoleRoutes::LIST_ROUTES . "</code></p>
                        <pre>{$output1}</pre>
                        <p style='font-weight: bold; font-size: x-large'><code>$ ./console " . \ConsoleRoutes::LIST_CONFIG . "<code></p>
                        <pre>{$output2}</pre>
                        <p>Controller action was <em>" . __METHOD__ . "();</em></p>");

        echo $this->pageBuilder->render($page);
    }
}