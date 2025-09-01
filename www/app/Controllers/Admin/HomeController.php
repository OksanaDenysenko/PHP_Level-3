<?php

namespace App\Controllers\Admin;

use App\Repository\BookRepository;
use Core\Application\Controller;
use Core\Application\Paginator;

class HomeController extends Controller
{
    /**
     * @throws \Exception
     */
    function index(): void
    {
        $paginator = new Paginator((new BookRepository())->getBooksWithAuthorsAndClicks(), 4);
        $this->view('Admin/home', $paginator->getPaginationData());

        require DEFAULT_TEMPLATE_ADMIN;
    }
}