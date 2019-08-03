<?php

namespace app;
require('./../vendor/autoload.php');

use app\dao\CategoriaDao;

$cd = $_GET['categoria'];

$dao = new CategoriaDao;
$dao->excluirCategoria($cd);

header("location: http://localhost/loja/app/view/TelaCategoria.php");
die();
