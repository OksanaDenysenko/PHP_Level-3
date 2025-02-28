<?php

namespace Core\Application;

use Exception;

class Controller
{
    public string $content = '';

    /**
     *
     * @param string $view - the name of the view to load
     * @param array $data
     * @param array $pagination
     * @return void
     * @throws Exception
     */
    public function view(string $view, array $data = [], array $pagination=[]): void
    {

        $filename = VIEWS_DIR . "/$view.php";

        if (file_exists($filename)) {
            ob_start();
            require_once $filename;
            $this->content = ob_get_clean();

            return;
        }

        throw new Exception(StatusCode::Page_Not_Found->name, StatusCode::Page_Not_Found->value);
    }
}