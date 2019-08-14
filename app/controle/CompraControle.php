<?php

namespace app\controle;

use app\entidades\Compra;
use app\dao\CompraDao;
use app\dao\AnuncioDao;

class CompraControle implements IControle
{
  public function inserir()
  {
    $compra = new Compra();
    $compra->cliente = $_POST['cliente'];
    $compra->entregar = $_POST['entrega'];
    $compra->valortotal = $_POST['valort'];
    $compra->quantidade = $_POST['quantidade'];
    $compra->cdanuncio = $_POST['codigo'];
    $compra->data = $_POST['data'];



    $dao = new AnuncioDao();

    $quantiaBanco = $dao->checarEstoque($compra->cdanuncio);

    if (($quantiaBanco - $compra->quantidade < 0)) {

      
      header("location: http://localhost/loja/app/view/TelaAnuncio.php");
      die("Tentou Inserir Maior que oq tinha e eu não tinha mensagem pra por aqui");
    } else {

      $dao = new CompraDao($compra);
      $dao->inserir($compra);

      header("location: http://localhost/loja/app/view/TelaAnuncio.php");
      die();
    }
  }
  public function alterar()
  { }

  public function excluir()
  { }
}
