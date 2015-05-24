<?php

class RouteNotFound
{

    public function __construct(Services $services)
    {
        
    }

    public function render()
    {
        return 'Route not found <a href="?r=' . Routes::HOME . '">Go home</a>';
    }

}