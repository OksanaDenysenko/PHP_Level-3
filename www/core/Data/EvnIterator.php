<?php

namespace Core\Data;

class EvnIterator implements \Iterator
{
    private int $position = 0;
    public array $array = [];

    public function __construct(string $file)
    {
        $this->array = $this->load($file);
    }

    /**
     * The function reads and parses an .env file
     * @param $file - .env file
     * @return array - an associative array that contains environment variables and their values
     */
    private function load($file): array
    {
        $file_contents = file_get_contents($file);
        $lines = explode("\n", $file_contents);
        $env = [];

        foreach ($lines as $line) {
            if (trim($line) === '' || str_starts_with($line, '#')) {
                continue;
            }

            list($key, $value) = explode('=', $line);
            $env[$key] = trim($value);
        }

        return $env;
    }

    /**
     * @inheritDoc
     */
    public function current(): mixed
    {
        return $this->array[array_keys($this->array)[$this->position]];
    }

    /**
     * @inheritDoc
     */
    public function next(): void
    {
        $this->position++;
    }

    /**
     * @inheritDoc
     */
    public function key(): string|int
    {
        return array_keys($this->array)[$this->position];
    }

    /**
     * @inheritDoc
     */
    public function valid(): bool
    {
        return $this->position < count($this->array);
    }

    /**
     * @inheritDoc
     */
    public function rewind(): void
    {
        $this->position = 0;
    }
}