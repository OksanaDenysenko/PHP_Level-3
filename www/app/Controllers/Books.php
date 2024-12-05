<?php

namespace App\Controllers;

use Core\Application\Controller;

class Books extends Controller
{
    function index()
    {
        $this->view('books');
    }
}