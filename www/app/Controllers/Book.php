<?php

namespace App\Controllers;

use Core\Controller;

class Book extends Controller
{
    function index()
    {
        $this->view('book');
    }
}