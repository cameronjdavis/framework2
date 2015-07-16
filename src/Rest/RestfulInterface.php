<?php

namespace Framework2\Rest;

interface RestfulInterface
{

    public function delete($id);

    public function create();

    public function get($id);
}
