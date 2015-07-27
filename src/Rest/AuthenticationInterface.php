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
}