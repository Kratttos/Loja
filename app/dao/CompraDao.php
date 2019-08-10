<?php

namespace app\dao;

use app\dao\AnuncioDao;
use PDO;

class CompraDao extends Dao
{

    public function inserir($compra)
    {
        $con = $this->getConnection();

        /**Insere a Compra na Tabela Compra
         * 
         */
        $ps = $con->prepare("Insert Into TbCompra  values (null,?,?,?,?,?,?)");
        $ps->bindParam(1, $compra->cliente);
        $ps->bindParam(2, $compra->entregar);
        $ps->bindParam(3, $compra->data);
        $ps->bindParam(4, $compra->valortotal);
        $ps->bindParam(5, $compra->quantidade);
        $ps->bindParam(6, $compra->cdanuncio);
        $ps->execute();

        /**
         * Pega no Banco a quantidade de estoque atual para fazer o update
         */

        $ps1 = $con->prepare("Select Estoque From TbAnuncio Where CdAnuncio = ?");
        $ps1->bindParam(1, $compra->cdanuncio);
        if ($ps1->execute() && $ps1->rowCount() > 0) {
            while ($row = $ps1->fetch(PDO::FETCH_OBJ)) {
                $estosquebanco = $row->Estoque;
            }
        }

        /**
         * Seta no Banco a nova Quantia de estoque de um anuncio
         */
        $valorfinal = $estosquebanco - $compra->quantidade;

        var_dump($valorfinal);
        echo '<br>';
        var_dump($estosquebanco);

        $ps2 = $con->prepare("Update TbAnuncio set Estoque = ? Where CdAnuncio = ? ;");
        $ps2->bindParam(1, $valorfinal);
        $ps2->bindParam(2, $compra->cdanuncio);
        $ps2->execute();

        /**
         * Desabilita o Anuncio se ele tiver zerado
         */

        if ($valorfinal == 0) {
            $dao = new AnuncioDao();
            $dao->excluirAnuncio($compra->cdanuncio);
        }
    }
}
