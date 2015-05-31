<?php

class Config
{
    const TEMPLATES = 'template';
    const BASE_PAGE = 'base_page';
}

return [
    Config::TEMPLATES => [
        Config::BASE_PAGE => '../template/base.html.php'
    ]] + require_once('../src/Example/config.php');
