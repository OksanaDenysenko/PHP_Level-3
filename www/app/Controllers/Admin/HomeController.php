<?php

namespace App\Controllers\Admin;

use App\Repository\AuthorRepository;
use App\Repository\BookAuthorRepository;
use App\Repository\BookRepository;
use App\Repository\ClickRepository;
use Core\Application\Controller;
use Core\Application\Handler;
use Core\Application\Paginator;
use Core\Application\StatusCode;
use Core\Data\Database;
use JetBrains\PhpStorm\NoReturn;

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