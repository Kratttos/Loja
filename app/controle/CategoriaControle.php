<?php

namespace app\controle;

use app\dao\CategoriaDao;
use app\entidades\Categoria;

class CategoriaControle implements IControle
{
    public function inserir()
    {
        $descricao = $_POST['descricao'];
        $dao = new CategoriaDao();
        $dao->inserirCategoria($descricao);

        header("location: http://localhost/loja/app/view/TelaCategoria.php");
        die();
    }
    public function alterar()
    {
        $cd = $_POST['codigo'];
        $descricao = $_POST['descricao'];

        $categoria = new Categoria();
        $categoria->cdcategoria = $cd;
        $categoria->descricao = $descricao;

        $dao = new CategoriaDao();
        $dao->editarCategoria($categoria);

        header("location: http://localhost/loja/app/view/TelaCategoria.php");
        die();
    }

    public function excluir()
    {
        $cd = $_GET['categoria'];

        $dao = new CategoriaDao;
        $dao->excluirCategoria($cd);

        header("location: http://localhost/loja/app/view/TelaCategoria.php");
        die();
    }
}
