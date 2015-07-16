<?php

namespace Framework2\Rest;

class RestfulRouteInfo
{
    /**
     * Name of the ID route param
     * @var string
     */
    private $idName;

    public function __construct($idName)
    {
        $this->idName = $idName;
    }

    /**
     * Get the name of the ID route param
     * @return string
     */
    public function getIdName()
    {
        return $this->idName;
    }
}
