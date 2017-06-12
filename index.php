<?php
//use App\Controller;
session_start();
ob_start();

require "start.php";

require "classes/View.php";
require "classes/FileManager.php";
require "classes/Session.php";
require "classes/Helper.php";
$className = ucfirst($_GET['route']) . 'Controller';
$file = "controller/" . $className . ".php";
if (file_exists($file)) {
    $controller = "\Controller\\" . $className;
    $class = new $controller;
    $op = $_GET['op'];
    $id = $_GET['id'];
    if (empty($op) && $className == "PersonController") {
        $class->index();
    } elseif (empty($id) && $className == "PersonController") {
        $class->$op();
    } elseif($className == "PersonController") {
        $class->$op($id);
    }

}