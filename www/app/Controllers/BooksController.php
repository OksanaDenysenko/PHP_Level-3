<?php

namespace App\Controllers;

use App\Repository\BookRepository;
use Core\Application\Controller;
use Core\Application\Paginator;

class BooksController extends Controller
{
    /**
     * @throws \Exception
     */
    function index(): void
    {
        $paginator = new Paginator((new BookRepository())->getBooksWithAuthors(),20);
        $this->view('books', $paginator->getPaginationData());

        require DEFAULT_TEMPLATE;
    }
}