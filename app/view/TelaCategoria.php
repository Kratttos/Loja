<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="./../css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="./../css/tabela.css" />
    <title>Lista de Categorias</title>
</head>

<body>
    <?php
    readfile("Topo.html");
    require('./../../vendor/autoload.php');

    use app\dao\CategoriaDao;
   
    ?>

    <div class="container">
        <a href="./TelaInserirCategoria.php" class="btn btn-success float-right mb-3 mr-3">Inserir</a>
        <table id="myTable">
            <tr class="header">
                <th style="width:93%;">Descrição</th>
                <th style="width: 2%;"></th>
                <th style="width:5%;"></th>
            </tr>
            <?php
            $dao = new CategoriaDao();
            $vetor = $dao->buscarTodos();
            if ($vetor != null) {
                for ($i = 0; $i < sizeof($vetor); $i++) {
                    echo ('
                        <tr>
                            <td>' .  $vetor[$i]->descricao   . '</td>
                            <td><a class="btn btn-primary" href="./TelaEditarCategoria.php?codigo=' . $vetor[$i]->cdcategoria . '&descricao=' . $vetor[$i]->descricao . '">Editar</a></td>
                            <td><a class="btn btn-danger"  href="./../Router.php?class=Categoria&metodo=excluir&categoria=' . $vetor[$i]->cdcategoria . '">Excluir</a></td>
                        ');
                    if ($i == (sizeof($vetor) - 1)) {
                        echo ('
                        </table>
                        ');
                    }
                }
            }


            ?>

    </div>




    <script type="text/javascript" src="../js/jquery.js"></script>
    <script src="../js/tabela.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
</body>

</html>