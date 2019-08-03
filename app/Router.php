<?php
require('./../vendor/autoload.php');

if (isset($_POST['metodo'])) {

    $class = $_POST['class'];
    $metodo = $_POST['metodo'];
} elseif (isset($_GET['metodo'])) {

    $class = $_GET['class'];
    $metodo = $_GET['metodo'];
} else {

    header("location: https://i.ytimg.com/vi/b50ft23TPTc/hqdefault.jpg");
}

$classeName = "app\\controle\\" . $class . "Controle";

$inicio = new $classeName();
$inicio->$metodo();
