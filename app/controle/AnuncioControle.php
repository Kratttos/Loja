<?php

namespace app\controle;

use app\entidades\Anuncio;
use app\dao\AnuncioDao;

class AnuncioControle implements IControle
{
    public function inserir()
    {
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
    }
    public function alterar()
    {
        $titulo = $_POST['titulo'];
        $quantidade = $_POST['quantidade'];
        $categoria = $_POST['categoria'];
        $valor = $_POST['valor'];
        $descricao = $_POST['descricao'];
        $cd = $_POST['cd'];

        $anuncio = new Anuncio();

        $anuncio->CdAnuncio = $cd;
        $anuncio->quantidade = $quantidade;
        $anuncio->categoria = $categoria;
        $anuncio->valor = $valor;
        $anuncio->descricao = $descricao;
        $anuncio->titulo = $titulo;
        echo '<br>';
        print_r($anuncio);
        echo '<br>';
        $dao = new AnuncioDao();
        $dao->alterarAnuncio($anuncio);

        header("location: http://localhost/loja/app/view/TelaAnuncio.php");
        die();
    }

    public function excluir()
    {
        $cod = $_GET['anuncio'];

        $dao = new AnuncioDao();
        $dao->excluirAnuncio($cod);

        header("location: http://localhost/loja/app/view/TelaAnuncio.php");
        die();
    }
}
