<?php

namespace app;

use app\dao\CategoriaDao;
use app\entidades\Categoria;

require('../vendor/autoload.php');

$cd = $_POST['codigo'];
$descricao = $_POST['descricao'];

$categoria = new Categoria();
$categoria->cdcategoria = $cd;
$categoria->descricao = $descricao;

$dao = new CategoriaDao();
$dao->editarCategoria($categoria);

header("location: http://localhost/loja/app/view/TelaCategoria.php");
die();