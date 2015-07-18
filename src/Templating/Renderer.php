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
        // simple, empty object to use as context for rendering
        $context = new \stdClass();

        // anonymous function to perform rendering
        $function = function($templateFile, $params) {
            // make all rendering params available in the template
            extract($params);

            // render the template into the buffer and return
            ob_start();
            require $templateFile;

            return ob_get_clean();
        };

        // bind the function to the empty object
        // doing so makes $this = the empty object (within the template)
        $boundFunction = $function->bindTo($context);

        // call the newly bound anonymous function to render
        return $boundFunction($templateFile, $this->renderingParams + $params);
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
