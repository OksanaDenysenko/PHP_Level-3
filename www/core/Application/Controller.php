<?php

namespace Core\Application;

class Controller
{
    public string $content = '';

    /**
     *
     * @param string $view - the name of the view to load
     * @param array $data
     * @return void
     */
    public function view(string $view, array $data = []): void
    {

        $filename = VIEWS_DIR . "/$view.php";

        if (file_exists($filename)) {
            ob_start();
            require_once $filename;
            $this->content= ob_get_clean();
        }
        //else вивід 404
    }
}