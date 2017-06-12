<?php

namespace Controller;
class ErrorController
{
    public function __construct(){
        $this::err404();
    }
    public function err404()
    {
        \View::render('views/404.php');
    }
}
?>