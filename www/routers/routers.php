<?php

use Core\Application\Router;

Router::get('/admin','Admin\Home','index');
Router::get('/','Books','index');
Router::get('/book/(?P<id>[0-9]+)','Book','index');
Router::get('/test','Admin\Test','index');