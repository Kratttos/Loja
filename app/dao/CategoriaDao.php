<?php

namespace app\dao;

use app\entidades\Categoria;
use PDO;

class CategoriaDao extends Dao
{
    public function buscarTodos()
    {
        $con = $this->getConnection();
        $ps = $con->prepare("Select * From TbCategoria");
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
        $con = $this->getConnection();
        $ps = $con->prepare("Delete From TbCategoria Where CdCategoria = ?");
        $ps->bindParam(1, $cd);
        $ps->execute();
    }

    public function inserirCategoria($descricao)
    {
        $con = $this->getConnection();
        $ps = $con->prepare("Insert Into TbCategoria values (null, ?)");
        $ps->bindParam(1, $descricao);
        $ps->execute();
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
