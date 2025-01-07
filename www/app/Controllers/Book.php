<?php

namespace App\Controllers;

use Core\Application\Controller;
use Core\Data\Database;

class Book extends Controller
{
    function index($id): void
    {
       $data=Database::getInstance()->query("SELECT b.id, b.title, b.content, b.year, b.number_of_pages, 
                     GROUP_CONCAT(a.full_name SEPARATOR ', ') AS authors 
                     FROM books b 
                     INNER JOIN book_author ba ON b.id = ba.book_id
                     INNER JOIN authors a ON ba.author_id = a.id
                     WHERE b.id=$id GROUP BY b.id")->getOne();

       $this->view('book', $data);
       require DEFAULT_TEMPLATE;
    }
}