<?php

use Core\Application\Router;

Router::get('/admin','Admin\HomeController','index');
Router::get('/','BooksController','index');
Router::get('/book/(?P<number>[0-9]+)','BookController','index');
Router::get('/test','Admin\Test','index');
Router::post('/book/clicks/(?P<number>[0-9]+)','BookController','increaseClicks');
Router::post('/book/views/(?P<number>[0-9]+)','BookController','increaseViews');
Router::delete('/admin/book/delete/(?P<number>[0-9]+)','Admin\HomeController','deleteBook');
Router::post('/admin/add/book','Admin\HomeController','createBook');