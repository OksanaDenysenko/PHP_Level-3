<?php

use Core\Application\Router;

Router::get("/admin","Admin\Home","index");
Router::get('/','Books','index');
Router::get('/book','Book','index');
//Router::add('GET', '/book/{id}', 'Book', 'index');