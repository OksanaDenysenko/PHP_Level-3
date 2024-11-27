<?php

namespace App\Controllers\admin;

use Core\Controller;

class Admin extends Controller
{
    function index()
    {
        $this->view('admin/admin');
    }
}