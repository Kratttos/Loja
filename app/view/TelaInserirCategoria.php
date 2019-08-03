<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/TelaCategoria.css" />
    <title>Inserir Categoria</title>
</head>

<body>
    <?php readfile("Topo.html");
    ?>

    <div class="container centralizar">
        <form action="./../InserirCategoria.php" method="POST" id="Form">
            <div class="row form-group">
                <div class="col-md-12">
                    <label>Nome da Categoria</label>
                    <input class="form-control"type="text" name="descricao" id="descricao">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <button class="btn btn-danger float-left mx-1" type="reset">Cancelar</button>
                    <a href="./TelaCategoria.php" class="btn btn-primary">Voltar</a>
                    <button class="btn btn-success float-right" type="submit">Salvar</button>
                </div>
            </div>

        </form>
    </div>

</body>

</html>