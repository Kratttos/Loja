$("#formulario").validate(
	{
		rules:{
			nmCategoria:{
				required:true			   
			}			
		}, 
		messages:{
			nmCategoria:{
				required:"Campo obrigatório"
			}				   
		}
	}
);