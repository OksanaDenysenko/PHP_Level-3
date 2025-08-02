<?php

namespace App\Controllers\Admin;

use App\Repository\AuthorRepository;
use App\Repository\BookAuthorRepository;
use App\Repository\BookRepository;
use App\Repository\ClickRepository;
use Core\Application\Controller;
use Core\Application\Handler;
use Core\Application\StatusCode;
use Core\Application\Validator\BookValidator;
use Core\Data\Database;
use JetBrains\PhpStorm\NoReturn;

class BookController extends Controller
{

    /**
     * The function handles an AJAX request to delete a book from the database
     * @param int $id - book id
     * @return void
     */
    #[NoReturn] public function deleteBook(int $id): void
    {
        $this->ensureAjax();

        (new BookRepository()->softDeleteBook($id))?
            $this->jsonResponse(StatusCode::OK->value):
            $this->jsonResponse(StatusCode::Server_Error->value);
    }

    /**
     * The function creates a new book and all related records in the database.
     * @throws \Exception
     */
    public function createBook(): void
    {
        $this->ensureAjax();
        $validator = new BookValidator($_POST);

        if (!$validator->validate()) {

            $this->jsonResponse(StatusCode::Bad_Request->value, StatusCode::Bad_Request->name, $validator->errors);
        }

        $title = $_POST['title'];
        $content = $_POST['description'] ?: '';
        $year = (int)$_POST['year'] ?: null;
        $pages = (int)$_POST['pages'] ?: null;
        $authors = array_filter([$_POST['author1'], $_POST['author2'], $_POST['author3']]);

        if (new BookRepository()->doesBookExistByTitle($title)) {
            $this->jsonResponse(StatusCode::Conflict->value, StatusCode::Conflict->name);
        }

        Database::getConnection()->beginTransaction();

        try {
            $bookId = new BookRepository()->addBook($title, $content, $year, $pages);

            foreach ($authors as $author) {
                $existingAuthor = new AuthorRepository()->findAuthorIdByName($author);
                $authorId = ($existingAuthor) ?: new AuthorRepository()->addAuthor($author);
                new BookAuthorRepository()->addBookAuthorLink($bookId, $authorId);
            }

            new ClickRepository()->addBook($bookId);
            Database::getConnection()->commit();

            $this->jsonResponse(StatusCode::OK->value, StatusCode::OK->name);
        } catch (\Exception $e) {
            Database::getConnection()->rollBack();
            Handler::logError($e->getMessage(), $e->getFile(), $e->getLine());

            $this->jsonResponse(StatusCode::Server_Error->value, StatusCode::Server_Error->name);
        }
    }
}