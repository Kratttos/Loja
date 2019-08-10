$(document).ready(
    $(function () {
        $('#valor').maskMoney({
            thousands: '.',
            decimal: ','
        });
        $('#quantidade').mask('000.000.000', { reverse: true });

    })
);

$("#FormularioInserirAnuncio").validate(
    {
        rules: {
            titulo: {
                required: true
            },
            quantidade: {
                required: true
            },
            valor: {
                required: true
            },
            descricao: {
                required: true
            }
        },
        messages: {
            titulo: {
                required: "Por Favor Digite o titulo do Anuncio"
            },
            quantidade: {
                required: "Por Favor Digite a Quantidade"
            },
            valor: {
                required: "Por Favor Digite o Valor"
            },
            descricao: {
                required: "Por Favor Digite uma Descrição"
            }

        }
    }
);

$("#FormularioInserirAnuncio").submit(function () {
    /**
     * Para Valor Total
     */
    var value = $('#valor').maskMoney('unmasked')[0];
    $('#valor').val(value);

    /**
     * Para Quantidade
     */

    var quantidade = $('#quantidade').val();

    var nova = quantidade.replace(".", "");
    $('#quantidade').val(nova);


});





