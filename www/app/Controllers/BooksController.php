<?php

namespace App\Controllers;

use App\Repository\BookRepository;
use Core\Application\Controller;

class BooksController extends Controller
{
    function index(): void
    {
//        $data = Database::getInstance()->query("SELECT b.id, b.title,
//              GROUP_CONCAT(a.full_name SEPARATOR ', ') AS authors
//              FROM books b
//              INNER JOIN book_author ba ON b.id = ba.book_id
//              INNER JOIN authors a ON ba.author_id = a.id
//              GROUP BY b.id;")->getAll();


        $this->view('books', (new BookRepository())->getBooksWithAuthors());

        require DEFAULT_TEMPLATE;

    }
}