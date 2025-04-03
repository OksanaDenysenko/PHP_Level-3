<?php

namespace App\Controllers\Admin;

use App\Repository\BookRepository;
use Core\Application\Controller;
use Core\Application\Paginator;
use Core\Data\Database;

class HomeController extends Controller
{
    /**
     * @throws \Exception
     */
    function index(): void
    {
        $paginator = new Paginator((new BookRepository())->getBooksWithAuthorsAndNumberOfClicks(),4);
        $this->view('Admin/home',
            ["books" => $paginator->data, "pagination" => $paginator->pagination]);

        require DEFAULT_TEMPLATE_ADMIN;
    }
}