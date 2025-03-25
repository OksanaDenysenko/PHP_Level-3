<?php

use Core\Application\Router;

Router::get('/admin','Admin\HomeController','index');
Router::get('/','BooksController','index');
//Router::get('/page/(?P<number>[0-9]+)','BooksController','index');
Router::get('/book/(?P<number>[0-9]+)','BookController','index');
Router::get('/test','Admin\Test','index');
Router::post('/books/clicks/(?P<number>[0-9]+)','BookController','increaseClicks');