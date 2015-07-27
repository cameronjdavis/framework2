<?php

namespace Framework2\Rest;

/**
 * Interface to determine if a request is authenticated or not.
 */
interface AuthenticationInterface
{

    /**
     * @return bool True if authenticated, otherwise false.
     */
    public function isAuthenticated();

    /**
     * Get the realm that this authentication protects.
     * @return string
     */
    public function getRealm();
}