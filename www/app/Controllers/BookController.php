<?php

namespace App\Controllers;

use App\Repository\BookRepository;
use Core\Application\Controller;

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
     * @param int $id
     * @return void
     */
    public function increaseClicks(int $id): void
    {
        if ($this->isAjax()) {
            $success = (new BookRepository())->increaseClicks($id);
            header('Content-Type: application/json');
            echo json_encode(['status' => $success ? 'success' : 'error']);
        } else {
            // Якщо це не AJAX-запит, можна перенаправити користувача або показати помилку
            header('HTTP/1.1 400 Bad Request');
            echo json_encode(['error' => 'Invalid request']);
        }
    }

    public function increaseViews(int $id)
    {
        if ($this->isAjax()) {
            $success = (new BookRepository())->increaseViews($id);
            header('Content-Type: application/json');
            echo json_encode(['status' => $success ? 'success' : 'error']);
        } else {
            // Якщо це не AJAX-запит, можна перенаправити користувача або показати помилку
            header('HTTP/1.1 400 Bad Request');
            echo json_encode(['error' => 'Invalid request']);
        }
    }
}