<?php

namespace Framework2\Services;

class Services
{
    private $instances;
    private $settings;

    /**
     * @var ServiceFactoryInterface
     */
    private $factory;

    public function __construct(array $settings, ServiceFactoryInterface $factory)
    {
        $this->settings = $settings;
        $this->factory = $factory;
    }

    public function get($key)
    {
        if (!isset($this->instances[$key])) {
            $this->instances[$key] = $this->create($key);
        }

        return $this->instances[$key];
    }

    public function create($key)
    {
        $serivce = $this->factory->create($key, $this->settings);

        if ($serivce) {
            return $serivce;
        }

        throw new \Exception("Service ({$key}) could not be created");
    }
}
