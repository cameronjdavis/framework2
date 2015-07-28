<?php

namespace Framework2\Rest;

/**
 * Interface to determine if a request is authenticated or not.
 */
interface AuthenticationInterface
{

    /**
     * Determine if the user is authentic and has access to the realm
     * this authentication protects.
     * @return bool True if authenticated, otherwise false.
     */
    public function isAuthenticated();

    /**
     * Get the realm that this authentication protects.
     * A realm is equivilant to a permission group. E.g. "Admin", "Standard user".
     * @return string
     */
    public function getRealm();
}