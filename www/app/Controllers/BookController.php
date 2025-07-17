<?php

namespace App\Controllers;

use App\Repository\BookRepository;
use App\Repository\ClickRepository;
use Core\Application\Controller;
use JetBrains\PhpStorm\NoReturn;

class BookController extends Controller
{
    /**
     * @throws \Exception
     */
    function index(int $id): void
    {
       $this->view('book', (new BookRepository())->getBookWithAuthors($id));

       require DEFAULT_TEMPLATE;
    }

    /**
     * The function handles an AJAX request to increment the click counter for a specific book
     * @param int $id - book id
     * @return void
     */
    #[NoReturn] public function increaseClicks(int $id): void
    {
        $this->ensureAjax();
        $this->jsonResponse((new ClickRepository())->increaseClicks($id));
    }

    /**
     * The function handles an AJAX request to increment the view count for a specific book
     * @param int $id - book id
     * @return void
     */
    #[NoReturn] public function increaseViews(int $id): void
    {
        $this->ensureAjax();
        $this->jsonResponse((new ClickRepository())->increaseViews($id));
    }
}