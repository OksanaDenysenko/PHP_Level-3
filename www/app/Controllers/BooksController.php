<?php

namespace App\Controllers;

use App\Repository\BookRepository;
use Core\Application\Controller;
use Core\Application\Pagination;

class BooksController extends Controller
{
    function index(): void
    {
        //$pagination = new Pagination('books',20,24);
        //show($pagination);

        $this->view('books', (new BookRepository())->getBooksWithAuthors());

        require DEFAULT_TEMPLATE;
    }
}