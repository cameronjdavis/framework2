<?php

namespace Framework2\Templating;

/**
 * Render templates with parameters.
 */
class Renderer
{
    /**
     * @var array
     */
    private $renderingParams;

    /**
     * Render a template file with parameters.
     * @param string $templateFile Path to the template file
     * @param array $params A compacted array
     * @return string The rendered template
     */
    public function render($templateFile, array $params = [])
    {
        extract($this->renderingParams + $params);

        // render the template into $output
        ob_start();
        require $templateFile;
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }

    /**
     * Add a named parameter that will be available
     * while rendering a template with render().
     * Useful for making standard helpers available
     * while rendering templates.
     * @param string $paramName E.g. 'router' means $router will be available.
     * @param mixed $param E.g. new Router().
     * @return Renderer
     */
    public function addRenderingParam($paramName, $param)
    {
        $this->renderingParams[$paramName] = $param;

        return $this;
    }
}
