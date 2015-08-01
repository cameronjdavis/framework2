<?php

namespace Framework2\Example;

use Framework2\Authentication\AuthenticationInterface;

/**
 * Exmaple authentication that uses basic HTTP authentication.
 */
class ExampleAuthentication implements AuthenticationInterface
{
    const USERNAME = 'user';
    const PASSWORD = 'secret';
    const EXAMPLE_REALM = 'Example realm';

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
     * @param string $realm Realm this authetnication is protecting
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
        // @todo: Here we would load the user from the DB and
        // 1) Verify the username and password being attempted, and
        // 2) Verify the user is allowed to acces $this->realm
        // Simulated realms that the user has access to.
        $usersRealms = [self::EXAMPLE_REALM];

        if (!isset($this->server['PHP_AUTH_USER']) || !isset($this->server['PHP_AUTH_PW'])) {
            return false;
        } else if (false == in_array($this->realm, $usersRealms)) {
            return false;
        }

        return $this->server['PHP_AUTH_USER'] == self::USERNAME && $this->server['PHP_AUTH_PW'] == self::PASSWORD;
    }

    /**
     * Get the realm this authentication is protecting.
     * @return string
     */
    public function getRealm()
    {
        return $this->realm;
    }
}