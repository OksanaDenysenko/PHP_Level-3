<?php

namespace Core;

class Controller
{
    /**
     * The function loads the view
     * @param $nameView - the name of the view to load
     * @return void
     */
    public function view(string $nameView): void
    {
        $filename = "../app/Views/" . $nameView . ".php";
        //show($filename);

        if (file_exists($filename)) {
            require_once $filename;

        } else {
            \Core\Error::error(404);
        }
    }
}