<?php

namespace App\Controllers;

use Core\Application\Controller;

class Book extends Controller
{
    function index()
    {
        $this->view('book');
    }
}