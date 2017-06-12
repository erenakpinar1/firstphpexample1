<?php

class Session
{
    public static function sessionControl($name)
    {
        return $_SESSION[$name];
    }

    public static function sessionCreate($name, $sessionValue)
    {
        $_SESSION[$name] = $sessionValue;
    }
}