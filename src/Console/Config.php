<?php

namespace Framework2\Console;

class Config
{
    /**
     * Multi-dimensional config array
     * @var array
     */
    private $config;

    /**
     * @param array $config Multi-dimensional config array
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * Echo the config array.
     */
    public function listConfig()
    {
        print_r($this->config);
    }
}