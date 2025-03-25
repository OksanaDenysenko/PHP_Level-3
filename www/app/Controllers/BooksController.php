<?php

namespace App\Controllers;

use App\Repository\BookRepository;
use Core\Application\Controller;

class BooksController extends Controller
{
    /**
     * @throws \Exception
     */
    function index(): void
    {
        $paginator=(new BookRepository())->getTitlesOfBooksWithAuthors();
        $this->view('books',
            ["books"=>$paginator->getItems(),"pagination"=>$paginator->getPaginationData()]);

        require DEFAULT_TEMPLATE;
    }
}