$(document).ready(
    $(function () {
        $('#quantidade').mask('000.000.000', { reverse: true });

        $('.maskMoney').maskMoney({ allowNegative: false, thousands: '.', decimal: ',' });

        $('.maskMoney').each(function () { // function to apply mask on load!
            $(this).maskMoney('mask', $(this).val());
        });   
}));

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
                required: true,
                min: Number.MIN_VALUE
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
                required: "Por Favor Digite o Valor",
                min : "Por Favor digite um valor maior do que 0"
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





