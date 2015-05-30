<?php

namespace Framework2\Templating;

/**
 * Render templates with parameters.
 */
class Renderer
{

    /**
     * Render a template file with parameters using "include".
     * @param string $templateFile Path to the template file
     * @param array $params A compacted array
     * @return string The rendered template
     */
    public function render($templateFile, array $params = [])
    {
        extract($params);

        // render the template into $output
        ob_start();
        require $templateFile;
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }
}
