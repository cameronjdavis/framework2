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
            JsonResponder $responder, AuthenticationInterface $authentication)
    {
        $this->crud = $crud;
        $this->routeParams = $routeParams;
        $this->routeInfo = $routeInfo;
        $this->responder = $responder;

        // could use "=== false" but its more cautious to use "!== true"
        if ($authentication->isAuthenticated() !== true) {
            $this->responder->respond(null, Http::NOT_AUTHENTICATED);
            // not allowed to execute any more so exit
            exit;
        }
    }

    public function delete()
    {
        $id = $this->routeParams->getInt($this->routeInfo->getIdName());

        $this->responder->respond(null,
                $this->crud->delete($id) ? Http::NO_CONTENT : Http::NOT_FOUND);
    }

    public function create()
    {
        $this->responder->respond($this->crud->create(), Http::CREATED);
    }

    public function get()
    {
        $id = $this->routeParams->getInt($this->routeInfo->getIdName());

        $object = $this->crud->get($id);

        $this->responder->respond($object, $object ? Http::OK : Http::NOT_FOUND);
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