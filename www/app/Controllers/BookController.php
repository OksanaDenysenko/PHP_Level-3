<?php

namespace App\Controllers;

use App\Repository\BookRepository;
use Core\Application\Controller;

class BookController extends Controller
{
    function index(int $id): void
    {
       $this->view('book', (new BookRepository())->getBookWithAuthors($id));

       require DEFAULT_TEMPLATE;
    }
}