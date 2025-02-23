<?php

use Core\Application\{EnvConfig, Router, Handler, StatusCode};

session_start();

require_once __DIR__ . '/../core/Application/config.php';
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../core/functions.php';
require_once __DIR__ . '/../routers/routers.php';

$handler = new Handler; //error handler
new EnvConfig(CONFIG_ENV_FILE); //reading the .env file and filling the $_ENV array

try {
    Router::getController();
    http_response_code(StatusCode::OK->value);
} catch (Exception $e) {
    $handler->exceptionHandler($e);
}
