<?php

namespace Framework2\Example;

use Framework2\Rest\AuthenticationInterface;

/**
 * Exmaple authentication that uses basic HTTP authentication.
 */
class ExampleAuthentication implements AuthenticationInterface
{
    /**
     * @var array
     */
    private $server;

    /**
     *
     * @param array $server PHP's $_SERVER array
     */
    public function __construct(array $server)
    {
        $this->server = $server;
    }

    /**
     * Return true if username and password are correct.
     * @return boolean
     */
    public function isAuthenticated()
    {
        if (!isset($this->server['PHP_AUTH_USER']) || !isset($this->server['PHP_AUTH_PW'])) {
            return false;
        }

        return $this->server['PHP_AUTH_USER'] == 'user' && $this->server['PHP_AUTH_PW'] == 'secret';
    }
}