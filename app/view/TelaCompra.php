<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="./../css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="./../css/erros.css" />
    <title>Tela de Compras</title>
</head>

<body>
    <?php

    use app\entidades\Anuncio;

    require('./../../vendor/autoload.php');

    readfile("Topo.html");
    $cd = $_POST['codigo'];;
    $anuncio = new Anuncio();
    $anuncio->CdAnuncio = $_POST['codigo'];
    $anuncio->titulo = $_POST['titulo'];
    $anuncio->quantidade = $_POST['quantidade'];
    $anuncio->valor = $_POST['valor'];
    $anuncio->nomeCategoria = $_POST['categoria'];
    $anuncio->descricao = $_POST['descricao'];
    ?>
    <div class="container centralizar">
        <form action="./../Router.php" method="POST" id="form">
            <div class="row form-group">
                <div class="col-md-8">
                    <label>Nome do Cliente</label>
                    <input class="form-control" type="text" name="cliente" id="cliente" value="">
                </div>
                <div class="col-md-4">
                    <label>Quantidade</label>
                    <input class="form-control" type="number" name="quantidade" id="quantidade" oninput="calcularValorTotal()" value="" min="1" max="<?php echo($anuncio->quantidade); ?>">
                </div>
                <div class="col-md-8">
                    <label>Entrega</label>
                    <input class="form-control" type="text" name="entrega" id="entrega" value="">
                </div>
                <div class="col-md-2">
                    <label>Valor Total</label>
                    <input class="form-control maskMoney" type="text" name="valort"  id="valort"  value="" readonly>
                    <input type="text" name="valorunit" id="valorunit" value="<?php echo($anuncio->valor) ?>">
                </div>
                <div class="col-md-2">
                    <label>Data</label>
                    <input class="form-control" type="date" name="data" id="data" value="">
                    <input type="hidden" name="codigo" id="codigo" value="<?php echo($anuncio->CdAnuncio) ?>">
                    <input type="hidden" name="class" id="class" value="Compra">
                    <input type="hidden" name="metodo" id="metodo" value="inserir">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <button class="btn btn-danger float-left mx-1" type="reset">Cancelar</button>
                    <a class="btn btn-primary" href="./TelaDetalhesAnuncio.php?anuncio=<?php echo($anuncio->CdAnuncio) ?> ">Voltar</a>
                    <button class="btn btn-success float-right" type="submit">Comprar</button>
                </div>
            </div>
        </form>
    </div>


    <script src="./../js/jquery.js"></script>
    <script src="./../js/jquery.validate.js"></script>
    <script src="./../js/jquery.mask.js"></script>
    <script src="./../js/jquery.maskMoney.js"></script>
    <script src="./../js/compraFormulario.js"></script>
</body>

</html>