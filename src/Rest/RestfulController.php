<?php

namespace Framework2\Rest;

use Framework2\Input;

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

        $this->restful->delete($id);
        
        echo json_encode($id);
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
}