<?php

namespace App\Controllers;

use Core\Application\Controller;
use Core\Data\Database;

class Books extends Controller
{
    function index(): void
    {
        $data = Database::getInstance()->query("SELECT b.id, b.title, 
              GROUP_CONCAT(a.full_name SEPARATOR ', ') AS authors
              FROM books b
              INNER JOIN book_author ba ON b.id = ba.book_id
              INNER JOIN authors a ON ba.author_id = a.id
              GROUP BY b.id;")->getAll();

        $this->view('books', $data);

        require DEFAULT_TEMPLATE;

    }
}