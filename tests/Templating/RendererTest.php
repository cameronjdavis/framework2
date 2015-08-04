<?php

namespace Framework2\Tests\Authentication;

use Framework2\Templating\Renderer as Helper;

class RendererTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Helper
     */
    private $helper;

    public function setUp()
    {
        $this->helper = new Helper();
    }

    public function test_render_templateRenderedWithParam()
    {
        $param1 = 'a value';

        // create a temp template file that will be rendered
        $templateFile = tempnam(sys_get_temp_dir(), 'test');
        // open the temp file for writing
        $handle = fopen($templateFile, "w");
        // use the temp file as a test template file by writing some rendering PHP into it
        fwrite($handle, 'Hello <?= $param1 ?>');
        $actual = $this->helper->render($templateFile, compact('param1'));

        // clean up the temp file
        fclose($handle);

        $this->assertEquals("Hello {$param1}", $actual);
    }

    public function test_addRenderingParam_paramIsAvailableForRender()
    {
        $param1 = 'a value';

        // add the param as a rendering param rather than passing it in to render()
        $this->helper->addRenderingParam('param1', $param1);

        // create a temp template file that will be rendered
        $templateFile = tempnam(sys_get_temp_dir(), 'test');
        // open the temp file for writing
        $handle = fopen($templateFile, "w");
        // use the temp file as a test template file by writing some rendering PHP into it
        fwrite($handle, 'Hello <?= $param1 ?>');

        $actual = $this->helper->render($templateFile);

        // clean up the temp file
        fclose($handle);

        $this->assertEquals("Hello {$param1}", $actual);
    }
}