<?php

namespace Framework2\Rest;

use Framework2\Input;

/**
 * Entry point for RESTful actions.
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

    public function __construct(CrudInterface $crud,
            RestfulRouteInfo $routeInfo, Input $routeParams)
    {
        $this->crud = $crud;
        $this->routeParams = $routeParams;
        $this->routeInfo = $routeInfo;
    }

    public function delete()
    {
        $id = $this->routeParams->getInt($this->routeInfo->getIdName());

        $this->render($this->crud->delete($id));
    }

    public function create()
    {
        $this->render($this->crud->create());
    }

    public function get()
    {
        $id = $this->routeParams->getInt($this->routeInfo->getIdName());

        $object = $this->crud->get($id);

        $this->render($object, $object ? 200 : 404);
    }

    public function getMultiple()
    {
        $this->render($this->crud->getMultiple());
    }

    public function update()
    {
        $id = $this->routeParams->getInt($this->routeInfo->getIdName());

        $this->render($this->crud->update($id));
    }

    /**
     * Render $data as a JSON string.
     * @param mixed $data
     * @return string
     */
    public function render($data, $code = 200)
    {
        http_response_code($code);

        header('Content-Type: application/json');

        echo json_encode($data, JSON_PRETTY_PRINT);
    }
}
