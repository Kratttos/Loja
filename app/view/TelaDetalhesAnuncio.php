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

    use app\dao\AnuncioDao;
   
    $dao = new AnuncioDao();
    $anuncio = $_GET['anuncio'];
    $anuncio = (object) $dao->buscarAnuncio((int) $anuncio);
    $cat = new CategoriaDao();
    $ob = $cat->buscarCategoria($anuncio->categoria);
    session_start();
    $_SESSION['CdAnuncio'] = $anuncio->CdAnuncio;
    ?>

    <div class="container centralizar">
        <form action="../view/TelaCompra.php" method="POST">
            <div class="row form-group">
                <div class="col-md-6">
                    <label>Titulo Anuncio</label>
                    <input class="form-control" type="text" name="titulo" id="titulo" value="<?php echo ($anuncio->titulo) ?>" readonly>
                </div>
                <div class="col-md-6">
                    <label>Quantidade</label>
                    <input class="form-control" type="text" name="quantidade" id="quantidade" value="<?php echo ($anuncio->quantidade) ?>" readonly>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6">
                    <label>Categoria</label>
                    <input class="form-control" type="text" name="valor" id="valor" value="<?php echo ($ob->cdcategoria) ?>" readonly>

                </div>
                <div class="col-md-6">
                    <label>Valor</label>
                    <input class="form-control" type="text" name="valor" id="valor" value="<?php echo ($anuncio->valor) ?>" readonly>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <label>Descrição</label>
                    <input class="form-control" type="text" name="descricao" id="descricao" value="<?php echo ($anuncio->descricao) ?>" readonly>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <button class="btn btn-danger float-left mx-1" type="reset">Cancelar</button>
                    <a href="/lojinha/index.php" class="btn btn-primary">Voltar</a>
                    <button class="btn btn-success float-right" type="submit">Comprar</button>
                </div>
            </div>
        </form>
    </div>

</body>

</html>