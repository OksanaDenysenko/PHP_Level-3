<?php

namespace App\Controllers\Admin;

use Core\Application\Controller;

class Home extends Controller
{
    function index()
    {
        $this->view('Admin/home');
    }
}