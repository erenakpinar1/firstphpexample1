<?php

class View
{
    public static function render($view, $variables = array())
    {
        extract($variables);
        include $view;
        return $view;
    }

    function redirect($url, $permanent = false)
    {
        header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }
}

?>