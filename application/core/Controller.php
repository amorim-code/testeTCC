<?php

namespace application\core;

class Controller
{
    protected function load (string $view , $params = [])
    {
        if (file_exists('../application/views/' . $view . '.php')) {
            include '../application/views/' . $view . '.php';
        }else{
            echo "erro";
        }
    }

    protected function caling (string $file, $perm = "index")
    {
        $controller = "\\application\\controllers\\" . $file;

        $novaPagina = new $controller;
        $novaPagina->{$perm}();
    }
}
