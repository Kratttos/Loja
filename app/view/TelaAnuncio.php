<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="./../css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="./../css/tabela.css" />
    <title>Document</title>
</head>

<body>
    <?php
        readfile('./Topo.html');
        require('./../../vendor/autoload.php');
        use app\dao\AnuncioDao;
    ?>
    <div class="container">
        <a href="./TelaInserirAnuncio.php" class="btn btn-success float-right">Inserir</a>
        <input type="text" id="myInput" onkeyup="filtrotabela()" placeholder="Procurar Categoria...">
        <table id="myTable">
            <tr class="header">

                <th style="width:55%;">Titulo</th>
                <th style="width:30%;">Categoria</th>
                <th style="width:5%;"></th>
                <th style="width:5%;"></th>
                <th style="width:5%;"></th>
            </tr>
            <?php
            $dao = new AnuncioDao();
            $vetor = $dao->listarAnuncios();
            if ($vetor != null) {
                for ($i = 0; $i < sizeof($vetor); $i++) {
                    echo ('
                            <tr>
                                <td>' . $vetor[$i]->titulo . '</td>
                                <td>' . $vetor[$i]->categoria   . '</td>
                                <td><a class="btn btn-warning" href=./TelaEditarAnuncio.php?anuncio=' . $vetor[$i]->CdAnuncio . '">Editar</a></td>
                                <td><a class="btn btn-danger"  href=./../Router.php?class=Anuncio&metodo=excluir&anuncio=' . $vetor[$i]->CdAnuncio . '">Excluir</a></td>
                                <td><a class="btn btn-primary" href=./TelaDetalhesAnuncio.php>Detalhes</a></td>
                            ');
                    if ($i == (sizeof($vetor) - 1)) {
                        echo ('
                            </table>
                            ');
                    }
                }
            }
            ?>
        </table>

    </div>
    <script src="./../js/tabela.js"></script>
</body>

</html>