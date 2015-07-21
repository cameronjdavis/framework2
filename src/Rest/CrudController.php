<?php

namespace Framework2\Rest;

use Framework2\Input;
use Framework2\ErrorBuffer;

/**
 * Entry points for performing CRUD operations.
 */
class CrudController
{
    /**
     * @var CrudInterface
     */
    private $crud;

    /**
     * @var Input
     */
    private $routeParams;

    /**
     * @var RestfulRouteInfo
     */
    private $routeInfo;

    /**
     * @var ErrorBuffer
     */
    private $errors;

    public function __construct(CrudInterface $crud,
            RestfulRouteInfo $routeInfo, Input $routeParams, ErrorBuffer $errors)
    {
        $this->crud = $crud;
        $this->routeParams = $routeParams;
        $this->routeInfo = $routeInfo;
        $this->errors = $errors;
    }

    public function delete()
    {
        $id = $this->routeParams->getInt($this->routeInfo->getIdName());

        $this->respond($this->crud->delete($id));
    }

    public function create()
    {
        $this->respond($this->crud->create());
    }

    public function get()
    {
        $id = $this->routeParams->getInt($this->routeInfo->getIdName());

        $object = $this->crud->get($id);

        $this->respond($object, $object ? 200 : 404);
    }

    public function getMultiple()
    {
        $this->respond($this->crud->getMultiple());
    }

    public function update()
    {
        $id = $this->routeParams->getInt($this->routeInfo->getIdName());

        $this->respond($this->crud->update($id));
    }

    public function respond($data, $code = 200)
    {
        // if any errors have been recorded
        if ($this->errors->hasErrors()) {
            $errors = new \stdClass();
            $errors->erorrs = $this->errors->getErrors();
            // override the response with the errors
            $data = $errors;
            $code = 400;
        }

        http_response_code($code);
        header('Content-Type: application/json');
        echo json_encode($data, JSON_PRETTY_PRINT);
    }
}
