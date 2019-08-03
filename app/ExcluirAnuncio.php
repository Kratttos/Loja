<?php

namespace app;
require('./../vendor/autoload.php');


use app\dao\AnuncioDao;

$cod = $_GET['anuncio'];

$dao = new AnuncioDao();
$dao->excluirAnuncio($cod);

header("location: http://localhost/loja/app/view/TelaAnuncio.php");
die();


