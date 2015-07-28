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
     * @param string $realm HTTP basic auth realm
     * @param bool $isAuthenticated Value isAuthenticated() will return
     */
    public function __construct($realm, $isAuthenticated = false)
    {
        $this->realm = $realm;
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

    /**
     * Get the realm this authentication is protecting
     * @return string
     */
    public function getRealm()
    {
        return $this->realm;
    }
}