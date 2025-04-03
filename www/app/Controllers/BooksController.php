<?php

namespace App\Controllers;

use App\Repository\BookRepository;
use Core\Application\Controller;
use Core\Application\Paginator;
use Core\Data\Database;

class BooksController extends Controller
{
    /**
     * @throws \Exception
     */
    function index(): void
    {
        $paginator = new Paginator((new BookRepository())->getBooksWithAuthors());
        $this->view('books',
            ["books" => $paginator->data, "pagination" => $paginator->pagination]);

        require DEFAULT_TEMPLATE;
    }
}