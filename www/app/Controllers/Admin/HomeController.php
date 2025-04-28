<?php

namespace App\Controllers\Admin;

use App\Repository\BookRepository;
use App\Repository\DeletedBookRepository;
use Core\Application\Controller;
use Core\Application\Paginator;

class HomeController extends Controller
{
    /**
     * @throws \Exception
     */
    function index(): void
    {
        $paginator = new Paginator((new BookRepository())->getActiveBooksWithAuthorsAndClicks(), 4);
        $this->view('Admin/home', $paginator->getPaginationData());

        require DEFAULT_TEMPLATE_ADMIN;
    }

    /**
     * The function handles an AJAX request to delete a book from the database
     * @param int $id - book id
     * @return void
     */
    public function deleteBook(int $id): void
    {
        $this->ensureAjax();
        $this->responseToAjax((new DeletedBookRepository())->softDeleteBook($id));
    }
}