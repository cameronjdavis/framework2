<?php

namespace Framework2\Services;

use Framework2\Services\Services;

interface ServiceFactoryInterface
{
    /**
     * Create a new instance of the service identified by $key
     * @param string $key Name of the service
     * @param array $settings Application settings array
     * @param Services
     */
    public function create($key, array $settings, Services $services);
}
