<?php

namespace Core\Application;

class Handler
{
public function __construct()
{
 set_error_handler([$this, 'handleError']);
 set_exception_handler([$this, 'handleException']);
}

    public function handleError($errno, $errstr, $errfile, $errline)
    {
    }

    public function handleException($exception)
    {
    }
}