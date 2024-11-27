<?php

namespace App\Controllers;

use Core\Controller;

class Books extends Controller
{
    function index()
    {
        $this->view('books');
    }
}