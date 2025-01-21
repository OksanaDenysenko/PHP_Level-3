<?php

use Core\Application\Router;

Router::get('/admin','Admin\HomeController','index');
Router::get('/','BooksController','index');
Router::get('/book/(?P<id>[0-9]+)','BookController','index');
Router::get('/test','Admin\Test','index');