<?php

namespace App\Controllers;

use App\Repository\BookRepository;
use App\Repository\ClickRepository;
use Core\Application\Controller;
use JetBrains\PhpStorm\NoReturn;
use Core\Application\StatusCode;

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
    public function increaseClicks(int $id): void
    {
        $this->ensureAjax();
        ((new ClickRepository())->increaseClicks($id)) ?
            $this->jsonResponse(StatusCode::OK->value) :
            $this->jsonResponse(StatusCode::Server_Error->value);
    }

    /**
     * The function handles an AJAX request to increment the view count for a specific book
     * @param int $id - book id
     * @return void
     */
    public function increaseViews(int $id): void
    {
        $this->ensureAjax();
        ((new ClickRepository())->increaseViews($id)) ?
            $this->jsonResponse(StatusCode::OK->value) :
            $this->jsonResponse(StatusCode::Server_Error->value);
    }
}