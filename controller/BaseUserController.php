<?php

namespace Controller;
class BaseUserController extends BaseController
{
    public function __construct()
    {
        $token = \Session::sessionControl('user');
        if (!empty($token))
        {
            \Models\AuthToken::tokenControl($token);
        }
        else{
            \View::redirect('index.php?route=Login');
        }
    }
}