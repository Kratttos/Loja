<?php
namespace app;

use app\dao\CategoriaDao;

require('./../vendor/autoload.php');

$descricao = $_POST['descricao'];
$dao = new CategoriaDao();
$dao->inserirCategoria($descricao);

header("location: http://localhost/loja/app/view/TelaCategoria.php");
die(); 
