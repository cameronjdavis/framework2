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

        echo json_encode($this->restful->delete($id));
    }

    public function create()
    {
        echo json_encode($this->restful->create());
    }

    public function get()
    {
        $id = $this->routeParams->getInt($this->routeInfo->getIdName());

        echo json_encode($this->restful->get($id));
    }

    public function getMultiple()
    {
        echo json_encode($this->restful->getMultiple());
    }

    public function update()
    {
        $id = $this->routeParams->getInt($this->routeInfo->getIdName());

        echo json_encode($this->restful->update($id));
    }
}
