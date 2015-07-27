<?php

namespace Framework2\Example;

use Framework2\Rest\AuthenticationInterface;

/**
 * Exmaple authentication that uses basic HTTP authentication.
 */
class ExampleAuthentication implements AuthenticationInterface
{
    const USERNAME = 'user';
    const PASSWORD = 'secret';

    /**
     * @var array
     */
    private $server;

    /**
     * @var string
     */
    private $realm;

    /**
     * @param array $server PHP's $_SERVER array
     * @param string $realm HTTP basic auth realm
     */
    public function __construct(array $server, $realm)
    {
        $this->server = $server;
        $this->realm = $realm;
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

        return $this->server['PHP_AUTH_USER'] == self::USERNAME && $this->server['PHP_AUTH_PW'] == self::PASSWORD;
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