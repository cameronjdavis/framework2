<?php

namespace Framework2\Rest;

use Framework2\Input;
use Framework2\Rest\JsonResponder;

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
     * @var JsonResponder
     */
    private $responder;

    public function __construct(CrudInterface $crud,
            RestfulRouteInfo $routeInfo, Input $routeParams,
            JsonResponder $responder)
    {
        $this->crud = $crud;
        $this->routeParams = $routeParams;
        $this->routeInfo = $routeInfo;
        $this->responder = $responder;
    }

    public function delete()
    {
        $id = $this->routeParams->getInt($this->routeInfo->getIdName());

        $this->responder->respond($this->crud->delete($id));
    }

    public function create()
    {
        $this->responder->respond($this->crud->create());
    }

    public function get()
    {
        $id = $this->routeParams->getInt($this->routeInfo->getIdName());

        $object = $this->crud->get($id);

        $this->responder->respond($object);
    }

    public function getMultiple()
    {
        $this->responder->respond($this->crud->getMultiple());
    }

    public function update()
    {
        $id = $this->routeParams->getInt($this->routeInfo->getIdName());

        $this->responder->respond($this->crud->update($id));
    }
}