<?php

namespace app\dao;

use app\entidades\Categoria;
use PDO;

class CategoriaDao extends Dao
{
    public function buscarTodos()
    {
        $con = $this->getConnection();
        $ps = $con->prepare("Select * From TbCategoria Where Habilitado = 'V'");
        if ($ps->execute() && $ps->rowCount() > 0) {
            while ($row = $ps->fetch(PDO::FETCH_OBJ)) {
                $categoria = new Categoria();
                $categoria->cdcategoria = $row->CdCategoria;
                $categoria->descricao = $row->Descricao;

                $lista[] = $categoria;
            }
            return $lista;
        }
    }

    public function excluirCategoria($cd)
    {
        $dao = new AnuncioDao();
        $qtd = $dao->buscarUso($cd);
        if ($qtd == 0) {
            $con = $this->getConnection();
            $ps = $con->prepare("Update TbCategoria Set Habilitado = 'F' Where CdCategoria = ?");
            $ps->bindParam(1, $cd);
            $ps->execute();
        }
    }

    public function inserirCategoria($descricao)
    {
        $con = $this->getConnection();

        if ($this->ChecarSeExiste($descricao)) {
  
            $ps = $con->prepare("Update TbCategoria Set Habilitado = 'V' Where Descricao = ?");
            $ps->bindParam(1, $descricao);

        } else {

            $ps = $con->prepare("Insert Into TbCategoria values (null,'V' ,?)");
            $ps->bindParam(1, $descricao);
        }
        $ps->execute();
    }
    public function ChecarSeExiste($nome)
    {
        $con = $this->getConnection();
        $ps = $con->prepare("Select count(CdCategoria) as qtd From TbCategoria Where Descricao = ?");
        $ps->bindParam(1, $nome);
        if ($ps->execute() && $ps->rowCount() > 0) {
            $row = $ps->fetch(PDO::FETCH_OBJ);
            if ($row->qtd > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            die;
        }
    }

    public function editarCategoria($categoria)
    {
        $con = $this->getConnection();
        $ps = $con->prepare("Update TbCategoria Set Descricao = ? Where CdCategoria = ?");
        $ps->bindParam(1, $categoria->descricao);
        $ps->bindParam(2, $categoria->cdcategoria);
        $ps->execute();
    }
}
