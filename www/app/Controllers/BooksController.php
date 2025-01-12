<?php

namespace App\Controllers;

use App\Repository\BookRepository;
use Core\Application\Controller;

class BooksController extends Controller
{
    function index(): void
    {
        $this->view('books', (new BookRepository())->getBooksWithAuthors());

        require DEFAULT_TEMPLATE;
    }
}