<?php

namespace App\Controllers;

use App\Repository\BookRepository;
use Core\Application\Controller;
use Core\Application\Pagination;

class BooksController extends Controller
{
    /**
     * @throws \Exception
     */
    function index(): void
    {
        $limit = 20; //number of entries per page
        $bookTable = new BookRepository();
        $pagination = new Pagination($bookTable->count(),$limit);
        $this->view('books', $bookTable->getBooksWithAuthors($limit, $pagination->getOffset()),
            $pagination->getPaginationData());

        require DEFAULT_TEMPLATE;
    }
}