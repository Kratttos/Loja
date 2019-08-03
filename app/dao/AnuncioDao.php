<?php

namespace app\dao;

use PDO;

use app\entidades\Anuncio;

class AnuncioDao extends Dao
{
    public function listarAnuncios()
    {
        $con = $this->getConnection();
        $ps = $con->prepare("Select CdAnuncio, Titulo, C.Descricao From TbAnuncio A,TbCategoria C 
        Where A.CdCategoria = C.CdCategoria");
        if ($ps->execute() && $ps->rowCount() > 0) {
            while ($row = $ps->fetch(PDO::FETCH_OBJ)) {

                $anuncio = new Anuncio();
                $anuncio->CdAnuncio = $row->CdAnuncio;
                $anuncio->titulo = $row->Titulo;
                $anuncio->categoria = $row->Descricao;

                $lista[] = $anuncio;
            }
            return $lista;
        }
    }

    public function listarAnuncioporCodigo($codigo)
    {
        $con = $this->getConnection();
        $ps = $con->prepare("Select A.*,C.Descricao as 'NomeCategoria' From TbAnuncio A,TbCategoria C
        Where A.CdCategoria = C.CdCategoria and CdAnuncio = ? ");
        $ps->bindParam(1, $codigo);
        if ($ps->execute() && $ps->rowCount() > 0) {
            while ($row = $ps->fetch(PDO::FETCH_OBJ)) {

                $anuncio = new Anuncio();

                $anuncio->CdAnuncio = $row->CdAnuncio;
                $anuncio->titulo = $row->Titulo;
                $anuncio->descricao = $row->Descricao;
                $anuncio->quantidade = $row->Estoque;
                $anuncio->valor = $row->Valor;
                $anuncio->categoria = $row->CdCategoria;
                $anuncio->nomeCategoria = $row->NomeCategoria;
            }

            return $anuncio;
        }
    }

    public function alterarAnuncio($anuncio){
        $con = $this->getConnection();
        $ps = $con->prepare("Update TbAnuncio Set Titulo = ? , Descricao = ? , Estoque = ? , Valor = ?, 
        CdCategoria = ? Where CdAnuncio = ?");
        $ps->bindParam(1,$anuncio->titulo);
        $ps->bindParam(2,$anuncio->descricao);
        $ps->bindParam(3,$anuncio->quantidade);
        $ps->bindParam(4,$anuncio->valor);
        $ps->bindParam(5,$anuncio->categoria);
        $ps->bindParam(6,$anuncio->CdAnuncio);

        $ps->execute();
      
        
    }

    public function excluirAnuncio($cd)
    {
        $con = $this->getConnection();
        $ps = $con->prepare("Delete From TbAnuncio Where CdAnuncio = ?");
        $ps->bindParam(1, $cd);
        $ps->execute();
    }

    public function inserirAnuncio($anuncio)
    {
        $con = $this->getConnection();
        $ps = $con->prepare("Insert Into TbAnuncio Values (null,? , ? , ? , ? , ?)");
        $ps->bindParam(1, $anuncio->titulo);
        $ps->bindParam(2, $anuncio->descricao);
        $ps->bindParam(3, $anuncio->quantidade);
        $ps->bindParam(4, $anuncio->valor);
        $ps->bindParam(5, $anuncio->categoria);
        $ps->execute();
    }
}
