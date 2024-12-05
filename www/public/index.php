<?php

use Core\Application\Router;

session_start();

require_once __DIR__ . '/../core/Application/config.php';
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../core/functions.php';
require_once __DIR__ . '/../routers/routers.php';

Router::getController();



