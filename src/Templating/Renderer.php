<?php

namespace Framework2\Templating;

use Framework2\Routing\Router;

/**
 * Render templates with parameters.
 */
class Renderer
{
    /**
     * @var Router
     */
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * Render a template file with parameters.
     * @param string $templateFile Path to the template file
     * @param array $params A compacted array
     * @return string The rendered template
     */
    public function render($templateFile, array $params = [])
    {
        // add the router so it is available while rendering
        $params['router'] = $this->router;

        extract($params);

        // render the template into $output
        ob_start();
        require $templateFile;
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }
}
