<?php

namespace Framework2\Rest;

/**
 * A CrudInterface provides methods to
 * - create
 * - read
 * - update
 * - delete
 * a stored record.
 */
interface CrudInterface
{

    public function delete($id);

    public function create();

    public function get($id);

    public function getMultiple();

    public function update($id);
}
