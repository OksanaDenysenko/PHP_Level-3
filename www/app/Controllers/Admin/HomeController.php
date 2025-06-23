<?php

namespace App\Controllers\Admin;

use App\Repository\AuthorRepository;
use App\Repository\BookAuthorRepository;
use App\Repository\BookRepository;
use App\Repository\ClickRepository;
use Core\Application\Controller;
use Core\Application\Handler;
use Core\Application\Paginator;
use Core\Data\Database;

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

    /**
     * The function handles an AJAX request to delete a book from the database
     * @param int $id - book id
     * @return void
     */
    public function deleteBook(int $id): void
    {
        $this->ensureAjax();
        $this->jsonResponse((new BookRepository())->softDeleteBook($id));
    }

    /**
     * The function creates a new book and all related records in the database.
     */
    public function createBook(): void
    {
        $this->ensureAjax();
        $title = $_POST['title'];
        $content = $_POST['description'] ?: null;
        $year = !empty($_POST['year']) ? (int)$_POST['year'] : null;
        $pages = !empty($_POST['pages']) ? (int)$_POST['pages'] : null;
        $authors = array_filter([$_POST['author1'], $_POST['author2'], $_POST['author3']]);
        Database::getConnection()->beginTransaction();

        try {
            $bookId = (new BookRepository())->addBook($title, $content, $year, $pages);

            foreach ($authors as $author) {
                $existingAuthor = (new AuthorRepository())->findAuthorIdByName($author);
                $authorId = ($existingAuthor) ? $existingAuthor : (new AuthorRepository())->addAuthor($author);
                (new BookAuthorRepository())->addBookAuthorLink($bookId, $authorId);
            }

            (new ClickRepository())->addBook($bookId);
            Database::getConnection()->commit();

            $this->jsonResponse(true);
        } catch (\Exception $e){
            Database::getConnection()->rollBack();
            Handler::logError($e->getMessage(), $e->getFile(), $e->getLine());

            $this->jsonResponse(false);
        }
    }
}