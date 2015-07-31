<?php

namespace Framework2\Console;

/**
 * String masks to apply colours to text outputted to the console.
 * E.g. printf(Colours::RED, 'Some red text');
 */
class Colours
{
    /**
     * Colour for outputting errors.
     */
    const ERROR = self::RED;

    /**
     * Colour for outputting success.
     */
    const SUCCESS = self::GREEN;

    /**
     * Colour for outputting warnings.
     */
    const WARN = self::YELLOW;

    // More colours
    const RED = "\033[01;31m%s\033[0m";
    const GREEN = "\033[01;32m%s\033[0m";
    const BLUE = "\033[01;34m%s\033[0m";
    const YELLOW = "\033[01;33m%s\033[0m";

}