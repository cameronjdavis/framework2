<?php

namespace Framework2\Tests\Authentication;

/**
 * Iterate the services loaded at boot and instantiate each of them.
 */
class InstantiateServicesTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Get a data provider array of all the services names loaded during boot.
     * @global array $services Global array of services
     * @return string[]
     */
    public function getServiceNames()
    {
        // load variable from boot.php
        global $services;

        // put the array value in an array
        $callback = function ($key) {
            return [$key];
        };

        // data provider is an array of one-element arrays
        // the one element is the name of the service
        // E.g. [['service 1'], ['service 2']]
        $dataProvider = array_map($callback,
                array_keys($services->getServices()));

        return $dataProvider;
    }

    /**
     * Instantiate each of the services created in boot.php.
     * @dataProvider getServiceNames
     */
    public function test_create_instantiate($key)
    {
        // load variable from boot.php
        global $services;

        $services->create($key);
    }
}