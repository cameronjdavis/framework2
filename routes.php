<?php

use Framework2\Controller;
use Framework2\Routing\Route;

class Routes
{
    const HOME = 'home';
}

return [
    Routes::HOME => new Route(
            Routes::HOME, Controller\Index::class, 'home'),
        ] + require_once('../src/Example/routes.php');
