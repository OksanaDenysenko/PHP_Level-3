<?php

namespace Core\Application;

use JetBrains\PhpStorm\NoReturn;
use Throwable;

class Handler
{
    public function __construct()
    {
        set_error_handler([$this, 'errorHandler']);
        set_exception_handler([$this, 'exceptionHandler']);
    }

    /**
     * The function handles errors that occur during program execution
     * @param $errno - error code
     * @param $errstr - error text
     * @param $errfile - file in which an error occurred
     * @param $errline - the line in which the error occurred
     * @return void
     */
    #[NoReturn] public function errorHandler($errno, $errstr, $errfile, $errline): void
    {
        //  show("This set_error_handler");
        $this->logError($errstr, $errfile, $errline);
        $this->response(StatusCode::Server_Error->name, StatusCode::Server_Error->value);

        //return true;
    }

    /**
     * The function handles exceptions that occur during program execution
     * @param Throwable $e - Throwable object
     * @return void
     */
    #[NoReturn] public function exceptionHandler(Throwable $e): void
    {
        //  show("This set_exception_handler");
        $this->logError($e->getMessage(), $e->getFile(), $e->getLine());
        $httpCodes = StatusCode::getArrayStatusCodes();

        if (in_array($e->getCode(), $httpCodes)) {
            $this->response($e->getMessage(), $e->getCode());
        }

        $this->response(StatusCode::Server_Error->name, StatusCode::Server_Error->value);
    }

    /**
     * The function sends status codes and corresponding messages to the client.
     * @param $message - messages to the client
     * @param $statusCode - http status codes
     * @return void
     */
    #[NoReturn] private function response(string $message, int $statusCode): void
    {
        http_response_code($statusCode);
        echo json_encode([$message => $statusCode]);

        exit();
    }

    /**
     * The function records error information in a log file
     * @param $errstr - error text
     * @param $errfile - file in which an error occurred
     * @param $errline - the line in which the error occurred
     * @return void
     */
    private function logError($errstr, $errfile, $errline): void
    {
        error_log("[ " . date('Y-m-d H:i:s') . " ] 
        Error: $errstr, File: $errfile, Line: $errline" . PHP_EOL, 3, ERROR_LOGS);
    }
}