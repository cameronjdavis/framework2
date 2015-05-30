<?php

use Framework2\Controller;
use Framework2\Routing\Route;

class Routes
{
    const HOME = 'home';
    const CONTACT = 'contact';
    const QUERY_STRING = 'query_string';
}

return [
    Routes::HOME => new Route(
            'index', Controller\Controller1::class, 'home'),
    Routes::CONTACT => new Route(
            'contact/{contactId}/{id2}', Controller\Controller1::class, 'contact', ['contactId' => '\d+', 'id2' => '\d+']),
    Routes::QUERY_STRING => new Route(
            'query_string', \Framework2\Example\QueryString::class, 'queryValues'),
];
