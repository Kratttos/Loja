$(document).ready(
    $(function() {

        $('.maskMoney').maskMoney({ allowNegative: false, thousands: '.', decimal: ',' });

        $('.maskMoney').each(function() {
            $(this).maskMoney('mask', $(this).val());
        });
    }));

$("#form").validate({
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
            required: "Por Favor Digite a Quantidade",
            number: "Por Favor Digite um numero valido",
            min: "Por favor entre com um valor igual ou maior que 1",
            max: "A quantidade não pode ser maior do que a quantidade em estoque."
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
});


$("#form").submit(function() {
    /**
     * Para Valor Total
     */
    var value = $('#valort').maskMoney('unmasked')[0];
    $('#valort').val(value);
});

function calcularValorTotal() {
    let quantidade = document.getElementById("quantidade").value;
    let valorunit = $('#valorunit').val();
    let limite = parseInt($('#quantidade').attr('max'));

    if (quantidade >= 0 && quantidade <= limite) {
        valorunit = parseFloat(valorunit);
        let total = (valorunit * quantidade).toFixed(2);
        $('#valort').val(total);

    } else {

        $('#valort').val(0);

    }


    $('.maskMoney').maskMoney({ allowNegative: false, thousands: '.', decimal: ',' });

    $('.maskMoney').each(function() {
        $(this).maskMoney('mask', $(this).val());
    });

}