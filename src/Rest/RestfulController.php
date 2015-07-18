<?php

namespace Framework2\Rest;

use Framework2\Input;

/**
 * Entry point for RESTful actions.
 */
class RestfulController
{
    /**
     * @var RestfulInterface
     */
    private $restful;

    /**
     * @var Input
     */
    private $routeParams;

    /**
     * @var RestfulRouteInfo
     */
    private $routeInfo;

    public function __construct(RestfulInterface $restful, RestfulRouteInfo $routeInfo, Input $routeParams)
    {
        $this->restful = $restful;
        $this->routeParams = $routeParams;
        $this->routeInfo = $routeInfo;
    }

    public function delete()
    {
        $id = $this->routeParams->getInt($this->routeInfo->getIdName());

        $this->render($this->restful->delete($id));
    }

    public function create()
    {
        $this->render($this->restful->create());
    }

    public function get()
    {
        $id = $this->routeParams->getInt($this->routeInfo->getIdName());

        $this->render($this->restful->get($id));
    }

    public function getMultiple()
    {
        $this->render($this->restful->getMultiple());
    }

    public function update()
    {
        $id = $this->routeParams->getInt($this->routeInfo->getIdName());

        $this->render($this->restful->update($id));
    }

    /**
     * Render $data as a JSON string.
     * @param mixed $data
     * @return string
     */
    public function render($data)
    {
        header('Content-Type: application/json');

        echo json_encode($data, JSON_PRETTY_PRINT);
    }
}
