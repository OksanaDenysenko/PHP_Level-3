<?php

namespace Core\Application;

class EnvIterator implements \Iterator
{
    private $file;
    private string $key;
    private mixed $value;

    public function __construct(string $file)
    {
        $this->file = fopen($file, 'r');
    }

    /**
     * The function returns the current element
     * @inheritDoc
     */
    public function current(): mixed
    {
        return $this->value;
    }

    /**
     * The function reads the next line and parses it
     * @inheritDoc
     */
    public function next(): void
    {
        $line = fgets($this->file);

        if ($line === false) return;

        $line = trim($line);

        if (empty($line) || str_starts_with($line, '#')) {
            $this->next(); // move to the next line

            return;
        }

        [$key, $value] = explode('=', $line);
        $this->key = trim($key);
        $this->value = trim($value);
    }

    /**
     * The function returns the key of the current element
     * @inheritDoc
     */
    public function key(): string
    {
        return ($this->key);
    }

    /**
     * The function checks if there are more rows to process
     * @inheritDoc
     */
    public function valid(): bool
    {
        if (feof($this->file)) { // end of file
            fclose($this->file);

            return false;
        }

        return true;
    }

    /**
     * The function rewinds the file to the beginning
     * @inheritDoc
     */
    public function rewind(): void
    {
        rewind($this->file); // the pointer is set to the beginning of the file
        $this->key = '';
        $this->value = '';
    }
}