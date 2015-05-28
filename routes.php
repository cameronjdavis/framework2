<?php

use Framework2\Controller;
use Framework2\Routing\Routes;
use Framework2\Routing\Route;

return [
    Routes::HOME => new Route(
            '',
            Controller\Controller1::class, 'home'),
    Routes::CONTACT => new Route(
            'contact/{contactId}/{id2}',
            Controller\Controller1::class, 'contact',
            ['contactId' => '\d+', 'id2' => '\d+']),
];
