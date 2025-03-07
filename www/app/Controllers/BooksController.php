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
        $limit = 20; //number of entries per page
        $this->view('books', (new BookRepository())->getBooksWithAuthors($limit));

        require DEFAULT_TEMPLATE;
    }
}