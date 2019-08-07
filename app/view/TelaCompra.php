<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
    <title>Document</title>
</head>

<body>
    <?php

    use app\entidades\Anuncio;
    require('./../../vendor/autoload.php');

    readfile("Topo.html");
    $anuncio = new Anuncio();
    $anuncio->CdAnuncio = $_POST['codigo'];
    $anuncio->titulo = $_POST['titulo'];
    $anuncio->quantidade = $_POST['quantidade'];
    $anuncio->valor = $_POST['valor'];
    $anuncio->nomeCategoria = $_POST['categoria'];
    $anuncio->descricao = $_POST['descricao'];

    ?>
    <div class="container centralizar">
        <form action="../controle/RealizarCompra.php" method="POST">
            <div class="row form-group">
                <div class="col-md-8">
                    <label>Nome do Cliente</label>
                    <input class="form-control" type="text" name="nome" id="nome" value="">
                </div>
                <div class="col-md-4">
                    <label>Quantidade</label>
                    <input class="form-control" type="text" name="quantidade" id="quantidade" value="">
                </div>
                <div class="col-md-8">
                    <label>Entrega</label>
                    <input class="form-control" type="text" name="entrega" id="entrega" value="">
                </div>
                <div class="col-md-2">
                    <label>Valor Total</label>
                    <input class="form-control" type="text" name="valort" id="valort" value="">
                </div>
                <div class="col-md-2">
                    <label>Data</label>
                    <input class="form-control" type="date" name="data" id="data" value="">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <button class="btn btn-danger float-left mx-1" type="reset">Cancelar</button>
                    <a href="./TelaDetalhesAnuncio.php" class="btn btn-primary">Voltar</a>
                    <button class="btn btn-success float-right" type="submit">Comprar</button>
                </div>
            </div>
        </form>
    </div>

</body>

</html>