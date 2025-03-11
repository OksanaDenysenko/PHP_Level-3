<?php

namespace App\Controllers\Admin;

use Core\Application\Controller;

class HomeController extends Controller
{
    /**
     * @throws \Exception
     */
    function index(): void
    {
        $this->view('Admin/home');
        require DEFAULT_TEMPLATE;
    }
}