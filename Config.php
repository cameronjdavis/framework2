<?php

namespace Framework2;

class Config
{

    const TEMPLATE = 'template';
    const BASE_PAGE = 'base_page';

    public $settings = [
        self::TEMPLATE => [
            self::BASE_PAGE => '../template/base.html.php'
        ]
    ];

}
