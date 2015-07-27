<?php

namespace Framework2\Rest;

interface AuthenticationInterface
{

    /**
     * @return bool True if authenticated, otherwise false.
     */
    public function isAuthenticated();
}