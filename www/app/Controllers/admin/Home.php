<?php

namespace App\Controllers\admin;

use Core\Application\Controller;

class Home extends Controller
{
    function index()
    {
        $this->view('admin/admin');
    }
}