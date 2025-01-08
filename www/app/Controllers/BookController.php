<?php

namespace App\Controllers;

use App\Repository\BookRepository;
use Core\Application\Controller;

class BookController extends Controller
{
    function index($id): void
    {
//       $data=Database::getInstance()->query("SELECT b.id, b.title, b.content, b.year, b.number_of_pages,
//                     GROUP_CONCAT(a.full_name SEPARATOR ', ') AS authors
//                     FROM books b
//                     INNER JOIN book_author ba ON b.id = ba.book_id
//                     INNER JOIN authors a ON ba.author_id = a.id
//                     WHERE b.id=$id GROUP BY b.id")->getOne();

       $this->view('book', (new BookRepository())->getOneBookWithAuthor($id));
       require DEFAULT_TEMPLATE;
    }
}