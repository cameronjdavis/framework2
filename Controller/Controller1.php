<?php

namespace Framework2\Controller;

use Framework2\Services;

class Controller1
{

    public function __construct(Services $services)
    {
        
    }

    public function home()
    {
        // @todo: render the template with variables
        return include('../src/template/home.html.php');
    }

    public function contact()
    {
        return 'Contect me page';
    }

}
