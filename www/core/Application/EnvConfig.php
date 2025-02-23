<?php

namespace Core\Application;

class EnvConfig
{
    public function __construct(string $file)
    {
        $this->loadEnv($file);
    }

    /**
     * The function loads data from the .env file into the $_ENV array using an EnvIterator
     * @param $file - .env file
     */
    private function loadEnv($file): void
    {
        $iterator = new EvnIterator($file);

        foreach ($iterator as $key => $value) {

            if ($key !== null) {
                $key = explode(".", $key);
                $_ENV[$key[0]][$key[1]] = $value;
            }
        }
    }
}