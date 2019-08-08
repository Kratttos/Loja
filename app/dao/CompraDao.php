<?php

namespace app\dao;

class CompraDao extends Dao{

    public function inserir($compra){
        $con = $this->getConnection();
        $ps = $con->prepare("Insert Into TbCompra values null,?,?,?,?,?,?");
        $ps->bindParam(1,$compra->cliente);
        $ps->bindParam(2,$compra->entregar);
        $ps->bindParam(3,$compra->data);
        $ps->bindParam(4,$compra->valortotal);
        $ps->bindParam(5,$compra->quantidade);
        $ps->bindParam(6,$compra->cdanuncio);

        var_dump($compra);
        echo '<br>';
        var_dump($ps);
        $ps->execute();
        
        

    }
}