<?php

namespace Framework2\Rest;

/**
 * Hard-coded authentication with no credential checking.
 */
class DumbAuthentication implements AuthenticationInterface
{
    /**
     * @var bool
     */
    private $isAuthenticated;

    /**
     * @param bool $isAuthenticated Value isAuthenticated() will return
     */
    public function __construct($isAuthenticated = false)
    {
        $this->isAuthenticated = $isAuthenticated;
    }

    /**
     * Return boolean value passed into constructor.
     * @return boolean
     */
    public function isAuthenticated()
    {
        return $this->isAuthenticated;
    }
}