<?php

use Core\Router;

session_start();

require_once __DIR__.'/../core/config.php';
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../core/functions.php';
require_once __DIR__.'/routers.php';

Router::loadController();



