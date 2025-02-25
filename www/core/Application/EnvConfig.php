<?php

namespace Core\Application;

class EnvConfig
{
    private static ?EnvConfig $instance=null;

    private function __construct($file) {
        $this->loadEnv($file);
    }

    /**
     * The function loads data from the .env file into the $_ENV array using an EnvIterator
     * @param $file - .env file
     */
    private function loadEnv($file): void
    {
        $iterator = new EnvIterator($file);

        foreach ($iterator as $key => $value) {

            if (!empty($key)) {
                $_ENV[$key] = $value;
            }
        }
    }

    /**
     * The function is responsible for creating only a single instance of the class
     */
    public static function getInstance($file): EnvConfig
    {
        if (self::$instance === null) {
            self::$instance = new self($file);
        }

        return self::$instance;
    }
}