<?php

namespace app\controle;
use app\entidades\Compra;
use app\dao\CompraDao;

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

      $dao = new CompraDao($compra);
      $dao->inserir($compra);
    }
    public function alterar()
    {
       
    }

    public function excluir()
    {
       
    }
}
