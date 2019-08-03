<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
    <title>Document</title>
</head>

<body>
    <?php
    readfile("Topo.html");
    require('./../../vendor/autoload.php');

    use app\dao\CategoriaDao;
    use app\dao\AnuncioDao;

    $cd = $_GET['anuncio'];
    $dao = new AnuncioDao();
    $ob = $dao->listarAnuncioporCodigo($cd);

    ?>
    <div class="container centralizar">
        <form action="./../Router.php" method="POST">
            <div class="row form-group">
                <div class="col-md-6">
                    <label>Titulo Anuncio</label>
                    <input class="form-control" type="text" name="titulo" id="titulo" value="<?php echo ($ob->titulo) ?>">
                </div>
                <div class="col-md-6">
                    <label>Quantidade</label>
                    <input class="form-control" type="text" name="quantidade" id="quantidade" value="<?php echo ($ob->quantidade) ?>">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6">
                    <label>Categoria</label>
                    <select class='form-control' id="categoria" name="categoria">
                   
                        <?php
                        $dao = new CategoriaDao();
                        $vetor = $dao->buscarTodos();
                        foreach ($vetor as $opcao) {
                            if ($opcao->cdcategoria == $ob->categoria){
                                echo ("<option selected value=" . $opcao->cdcategoria . ">{$opcao->descricao} ");
                            }else{
                                echo ("<option value=" . $opcao->cdcategoria . ">{$opcao->descricao} ");
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Valor</label>
                    <input class="form-control" type="text" name="valor" id="valor" value="<?php echo ($ob->valor) ?>">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <label>Descrição</label>
                    <input class="form-control" type="text" name="descricao" id="descricao" value="<?php echo ($ob->descricao) ?>">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <button class="btn btn-danger float-left mx-1" type="reset">Cancelar</button>
                    <a href="./TelaAnuncio.php" class="btn btn-primary">Voltar</a>
                    <button class="btn btn-success float-right" type="submit">Salvar</button>
                </div>
            </div>
            <input type="hidden" name="class" id="class" value="Anuncio">
            <input type="hidden" name="metodo" id="metodo" value="alterar">
            <input type="hidden" name="cd" id="cd" value="<?php echo($cd) ?>">
        </form>
    </div>

</body>

</html>