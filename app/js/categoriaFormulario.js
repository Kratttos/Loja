$("#FormCategoria").validate(
	{
		rules:{
			descricao:{
				required:true			   
			}			
		}, 
		messages:{
			descricao:{
				required:"Por Favor Digite o nome da Categoria"
			}				   
		}
	}
);