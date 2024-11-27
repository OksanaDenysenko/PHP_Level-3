<?php

use Core\Router;

Router::add("GET","/admin","admin\Admin","index");
Router::add('GET','/','Books','index');
Router::add('GET','/book','Book','index');
//Router::add('GET', '/book/{id}', 'Book', 'index');