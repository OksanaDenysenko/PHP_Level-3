<?php

use Core\Application\Router;

session_start();

require_once __DIR__ . '/../core/Application/config.php';
require_once __DIR__ . '/../core/Data/configDB.php';
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../core/functions.php';
require_once __DIR__ . '/../routers/routers.php';

$handler=new \Core\Application\Handler(); //error handler

try {
    Router::getController();
} catch (Exception $e) {
    $handler->exceptionHandler($e);
}

http_response_code(\Core\Application\StatusCode::OK->value);



