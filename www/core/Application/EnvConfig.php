<?php

namespace Core\Application;

class EnvConfig
{
    private static ?EnvConfig $instance=null;
    private static array $env=[];

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
                self::$env[$key] = $value;
            }
        }
    }

    /**
     * The function gets the value of the environment variable by its key
     * @param string $key - the key of the environment variable in the array
     * @param $default
     * @return mixed|null
     */
    public static function get(string $key, $default=null): mixed
    {
        return self::$env[$key]??$default;
    }

    /**
     * The function is responsible for creating only a single instance of the class
     */
    public static function instantiate($file): EnvConfig
    {
        if (self::$instance === null) {
            self::$instance = new self($file);
        }

        return self::$instance;
    }
}