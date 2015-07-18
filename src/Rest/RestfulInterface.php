<?php

namespace Framework2\Rest;

/**
 * A class that implements this interface can
 * perform normally RESTful actions like.
 * E.g. Create, get, delete.
 */
interface RestfulInterface
{

    public function delete($id);

    public function create();

    public function get($id);
    
    public function getMultiple();
    
    public function update();
}
