<?php

namespace app;

require('./../vendor/autoload.php');

use app\entidades\Anuncio;
use app\dao\AnuncioDao;


$anuncio = new Anuncio();

$anuncio->titulo = $_POST['titulo'];
$anuncio->descricao = $_POST['descricao'];
$anuncio->quantidade = $_POST['quantidade'];
$anuncio->valor = $_POST['valor'];
$anuncio->categoria = $_POST['categoria'];

$dao = new AnuncioDao();
$dao->inserirAnuncio($anuncio);

header("location: http://localhost/loja/app/view/TelaAnuncio.php");
die();