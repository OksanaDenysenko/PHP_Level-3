<?php

namespace Core\Application;

class EvnIterator implements \Iterator
{
    private $file;
    private int|string $section;
    private int|string $key;
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

        if (str_starts_with($line, '[') && str_ends_with($line, ']')) {
            $this->section = trim($line, "[]");
            $this->next();

            return;
        }

        list($key, $value) = explode('=', $line);
        $this->key = trim($key);
        $this->value = trim($value);
    }

    /**
     * The function returns the key of the current element
     * @inheritDoc
     */
    public function key(): string
    {
        return ($this->section . "." . $this->key);
    }

    /**
     * The function checks if there are more rows to process
     * @inheritDoc
     */
    public function valid(): bool
    {
        if (ftell($this->file) === 0) { // line not yet read
            $this->next();
        }

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
        $this->key = null | 0;
        $this->value = null;
        $this->section = null | 0;
    }
}