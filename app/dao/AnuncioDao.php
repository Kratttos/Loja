<?php

namespace app\dao;

use PDO;

use app\entidades\Anuncio;

class AnuncioDao extends Dao
{
    /**
     * Lista Todos os Anuncios que estão marcados como habilitados (V) no Banco.
     *
     * @return Array de Anuncios
     */
    public function listarAnuncios()
    {
        $con = $this->getConnection();
        $ps = $con->prepare("Select CdAnuncio, Titulo, C.Descricao From TbAnuncio A,TbCategoria C 
        Where A.CdCategoria = C.CdCategoria and A.Habilitado = 'V';");
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


    /**
     * Conta a quantidade de Anuncios ativos que uma determinada Categoria tem no banco.
     *
     * @param int $cat {Codigo da Categoria}
     * 
     * @return int $quantidade {com a quantidade de vezes que a categoria esta listada em algum Anuncio 
     * marcada como Ativo (Habilitado = V) }
     */
    public function buscarUso($cat)
    {

        $con = $this->getConnection();
        $ps = $con->prepare("Select count(CdAnuncio) as qtd from TbAnuncio Where CdCategoria = ? and Habilitado = 'V';");
        $ps->bindParam(1, $cat);
        if ($ps->execute() && $ps->rowCount() > 0) {
            while ($row = $ps->fetch(PDO::FETCH_OBJ)) {
                $quantidade = $row->qtd;
            }
            return $quantidade;
        } else {
            return 0;
        }
    }


    /**
     * Pega os Dados de um unico Anuncio pelo seu Codigo.
     *
     * @param int $codigo {Codigo do Anuncio}
     * @return Anuncio $anuncio {Objeto Contendo os Dados do Anuncio}
     */
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


    /**
     * Altera os Dados do Anuncio no Banco.
     *
     * @param Anuncio $anuncio {Objeto com dados do Objeto}
     * 
     * @return void
     */
    public function alterarAnuncio($anuncio)
    {
        $con = $this->getConnection();
        $ps = $con->prepare("Update TbAnuncio Set Titulo = ? , Descricao = ? , Estoque = ? , Valor = ?, 
        CdCategoria = ? Where CdAnuncio = ?");
        $ps->bindParam(1, $anuncio->titulo);
        $ps->bindParam(2, $anuncio->descricao);
        $ps->bindParam(3, $anuncio->quantidade);
        $ps->bindParam(4, $anuncio->valor);
        $ps->bindParam(5, $anuncio->categoria);
        $ps->bindParam(6, $anuncio->CdAnuncio);

        $ps->execute();
    }


    /**
     * Muda o Atributo Habilitado do Anuncio para F para que ele não aparece nos Selects mas mantem o Anuncio
     * no Banco.
     *
     * @param int $cd {Codigo do Anuncio}
     * @return void
     */
    public function excluirAnuncio($cd)
    {
        $con = $this->getConnection();
        $ps = $con->prepare("Update TbAnuncio Set Habilitado = 'F' Where CdAnuncio = ?");
        $ps->bindParam(1, $cd);
        $ps->execute();
    }


    /**
     * Insere um Anuncio no Banco.
     *
     * @param Anuncio $anuncio {Objeto com os dados do Anuncio}
     * @return void
     */
    public function inserirAnuncio($anuncio)
    {
        $con = $this->getConnection();
        $ps = $con->prepare("Insert Into TbAnuncio Values (null,? , ? , ? , ? , ?,'V')");
        $ps->bindParam(1, $anuncio->titulo);
        $ps->bindParam(2, $anuncio->descricao);
        $ps->bindParam(3, $anuncio->quantidade);
        $ps->bindParam(4, $anuncio->valor);
        $ps->bindParam(5, $anuncio->categoria);
        $ps->execute();
    }


    /**
     * Busca a Quantia em estoque de um Anuncio
     *
     * @param int $cd {Codigo do Anuncio}
     * @return int $quantia {Quantia de Estoque}
     */
    public function checarEstoque($cd){

        $con = $this->getConnection();
        $ps = $con->prepare("Select Estoque From TbAnuncio Where CdAnuncio = ?");
        $ps->bindParam(1,$cd);
        if ($ps->execute() && $ps->rowCount() > 0) {
            while ($row = $ps->fetch(PDO::FETCH_OBJ)) {
                $quantia = $row->Estoque;
            }
        }
        return $quantia;
    }
}
