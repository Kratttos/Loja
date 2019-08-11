$(document).ready(
    $(function () {
        $('#quantidade').mask('000.000.000', { reverse: true });
  


        $('.maskMoney').maskMoney({ allowNegative: false, thousands: '.', decimal: ',' });

        $('.maskMoney').each(function () {
            $(this).maskMoney('mask', $(this).val());
        });
    }));

$("#form").validate(
    {
        rules: {
            cliente: {
                required: true
            },
            quantidade: {
                required: true
            },
            entrega: {
                required: true
            },
            valort: {
                required: true
            },
            data: {
                required: true
            }
        },
        messages: {
            cliente: {
                required: "Por Favor Digite o nome do Cliente"
            },
            quantidade: {
                required: "Por Favor Digite a Quantidade"
            },
            entrega: {
                required: "Por Favor Digite o local de Entrega"
            },
            valort: {
                required: "Por Favor Digite a Valor"
            },
            data: {
                required: "Por Favor Selecione a Data"
            }
        }
    }
);

$("#form").submit(function () {
    /**
     * Para Valor Total
     */
    var value = $('#valort').maskMoney('unmasked')[0];
    $('#valort').val(value);

    /**
     * Para Quantidade
     */
    let quantidade = $('#quantidade').val();
    let nova = quantidade.replace(".", "");
    $('#quantidade').val(nova);


});
/**
 * Essa Desgraça Seta o Valor Total de acordo com a Quantidade colocada
 */
$("#quantidade").change(function () {
    let quantidade = document.getElementById("quantidade").value.replace(".","");
    let valorunit = $('#valorunit').val();
    valorunit = parseFloat(valorunit);
    let total = valorunit * quantidade;

    $('#valort').val(total);

    $('.maskMoney').maskMoney({ allowNegative: false, thousands: '.', decimal: ',' });

    $('.maskMoney').each(function () {
        $(this).maskMoney('mask', $(this).val());
    });
});






