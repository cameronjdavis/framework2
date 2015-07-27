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

    /**
     * Delete a record.
     * @param int $id
     * @return bool True if resource was found, otherwise false
     */
    public function delete($id);

    /**
     * Create a new record.
     * @return mixed The new record
     */
    public function create();

    /**
     * Get a record by ID.
     * @param int $id
     * @return mixed|null The record or null if not found.
     */
    public function get($id);

    /**
     * Get all records.
     * @return array
     */
    public function getMultiple();

    /**
     * Update an existing record.
     * @param int $id
     * @return mixed The updated record
     */
    public function update($id);
}
