<?php

use Framework2\Controller;
use Framework2\Routing\Route;

class Routes
{
    const HOME = 'home';
    const CONTACT = 'contact';
}

return [
    Routes::HOME => new Route(
            'TODO', Controller\Controller1::class, 'home'),
    Routes::CONTACT => new Route(
            'contact/{contactId}/{id2}', Controller\Controller1::class, 'contact', ['contactId' => '\d+', 'id2' => '\d+']),
    'with_param' => new Route(
            'with_param', Controller\Controller1::class, 'withParam'),
];
