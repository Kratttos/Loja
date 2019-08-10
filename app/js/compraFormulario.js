$(document).ready(
    $(function () {
        $('#valort').maskMoney({
            thousands: '.',
            decimal: ','
        });
        $('#quantidade').mask('000.000.000',{reverse: true});

    })
);

$("#form").validate(
	{
		rules:{
			cliente:{
                required:true
			},
			quantidade:{
                required:true
			},
			entrega:{
				required:true
            },
            valort:{
                required:true
            },
            data:{
                required:true
            }
		}, 
		messages:{
			cliente:{
                required:"Por Favor Digite o nome do Cliente"
			},
			quantidade:{
                required:"Por Favor Digite a Quantidade"
			},
			entrega:{
				required:"Por Favor Digite o local de Entrega"
            },
            valort:{
                required:"Por Favor Digite a Valor"
            },
            data:{
                required:"Por Favor Selecione a Data"
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
    let nova = quantidade.replace(".","");
    $('#quantidade').val(nova);


});





