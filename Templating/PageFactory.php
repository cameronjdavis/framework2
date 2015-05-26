<?php

namespace Framework2\Templating;

class PageFactory
{

    const BASE_PAGE = '../template/base.html.php';

    public function create()
    {
        return new Page();
    }

    public function render(Page $page)
    {
        http_response_code($page->getHttpCode());

        include(self::BASE_PAGE);
    }

}
