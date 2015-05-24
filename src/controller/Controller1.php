<?php

class Controller1
{

    private $testHelper;

    public function __construct(Services $services)
    {
        $this->testHelper = $services->get(TestClass2::class);
    }

    public function home()
    {
        // @todo: render the template with variables
        $value1 = $this->testHelper->getValue2();
        echo $value1;
        return include('../src/template/home.html.php');
    }

    public function contact()
    {
        return 'Contect me page';
    }

}
