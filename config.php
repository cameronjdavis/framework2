<?php

return [
    'template' => [
        'base_page' => '../template/base.html.php'
    ],
    Framework2\Services\Services::PARAM_CONVERTERS => [
        Framework2\ParamConverting\TestClass::class => Framework2\ParamConverting\TestClassConverter::class,
    ],
];
