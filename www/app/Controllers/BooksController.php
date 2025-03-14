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
        $paginator=(new BookRepository())->getBooksWithAuthors($limit);
        $this->view('books',
            ["books"=>$paginator->getItems(),"pagination"=>$paginator->getPaginationData()]);

        require DEFAULT_TEMPLATE;
    }
}