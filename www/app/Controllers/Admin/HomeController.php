<?php

namespace App\Controllers\Admin;

use App\Repository\BookRepository;
use Core\Application\Controller;

class HomeController extends Controller
{
    /**
     * @throws \Exception
     */
    function index(): void
    {
        $limit = 4; //number of entries per page
        $paginator=(new BookRepository())->getTitlesAndYearsOfBooksWithAuthors($limit);
        $this->view('Admin/home',
            ["books"=>$paginator->getItems(),"pagination"=>$paginator->getPaginationData()]);
        require DEFAULT_TEMPLATE_ADMIN;
    }
}