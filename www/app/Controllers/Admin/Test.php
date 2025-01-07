<?php

namespace App\Controllers\Admin;

use Core\Application\Controller;

class Test extends Controller
{
    function index()
    {
        $this->view('Admin/test');
        require DEFAULT_TEMPLATE;
    }
}