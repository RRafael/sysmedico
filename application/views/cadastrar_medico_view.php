<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<!-- GOOGLE FONTS-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans'
	rel='stylesheet' type='text/css' />
<link rel="stylesheet"
	href="<?php echo base_url('includes/admin/css/bootstrap.css') ?>">
<link rel="stylesheet"
	href="<?php echo base_url('includes/admin/css/custom.css') ?>" />
<link rel="stylesheet"
	href="<?php echo base_url('includes/admin/css/font-awesome.css') ?>" />
</head>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<script
	src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

<script>
function limpa_formulario_cep() {
	//Limpa valores do formulário de cep.
	//document.getElementById('logradouro').value=("");
	//document.getElementById('bairro').value=("");
	document.getElementById('cidade').value=("");
	document.getElementById('estado').value=("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
    	//Atualiza os campos com os valores.
    	//document.getElementById('logradouro').value=(conteudo.logradouro);
    	//document.getElementById('bairro').value=(conteudo.bairro);
    	document.getElementById('cidade').value=(conteudo.localidade);
    	document.getElementById('estado').value=(conteudo.uf);
    } //end if.
    else {
    	//CEP não Encontrado.
    	limpa_formulario_cep();
    	alert("CEP não encontrado.");
    }
}

function pesquisacep(valor) {
        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');
        
        //Verifica se campo cep possui valor informado.
        if (cep != "") {
        
        	//Expressão regular para validar o CEP.
        	var validacep = /^[0-9]{8}$/;
        
        	//Valida o formato do CEP.
        	if(validacep.test(cep)) {
        
        		//Preenche os campos com "..." enquanto consulta webservice.
        		//document.getElementById('logradouro').value="...";
        		//document.getElementById('bairro').value="...";
        		document.getElementById('cidade').value="...";
        		document.getElementById('estado').value="...";										
        		//Cria um elemento javascript.
        		var script = document.createElement('script');
        
        		//Sincroniza com o callback.
        		script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
        		
        		//Insere script no documento e carrega o conteúdo.
        		document.body.appendChild(script);
        
        	} //end if.
        	else {
        		//cep é inválido.
        		limpa_formulario_cep();
        		alert("Formato de CEP inválido.");
        	}
        } //end if.
        else {
        	//cep sem valor, limpa formulário.
        	limpa_formulario_cep();
        }
    };
    
    jQuery(document).ready(function($) {   			  			   
        $("#telefone").mask("(99) 99999-9999");
        $("#cep").mask("99999-999");	
    });

    $(document).ready(function(){
        var addButton = $('#add_button'); //Add button selector
        var wrapper = $('#field_especialidades'); //Input field wrapper

        $(addButton).click(function(){
        	  $.ajax({
        	        type: "GET", 
        	        url: "<?php echo base_url('/especialidade/listar/'); ?>",
        	        timeout: 3000,
        	        datatype: 'JSON',
        	        contentType: "application/json; charset=utf-8",
        	        cache: false,
        	        beforeSend: function() {
        	            $("h2").html("Carregando..."); //Carregando
        	        },
        	        error: function() {
        	            $("h2").html("O servidor não conseguiu processar o pedido");
        	        },
        	        success: function(retorno) {
        	                var especialidades = JSON.parse(retorno);
        	                var item = '<div><select class="form-control-inline" style="width: 60%;" type="text" name="especialidades[]" ><option value="">--Selecione--</option>';        	           
        	                
        	                $.each(especialidades,function(i, especialidade){
        	                	
        	                	item = item + '<option value='+especialidade.id+' >'+especialidade.nome+'</option>';
            	             
        	                });
        	                item = item + '</select><a href="javascript:void(0);" class="btn btn-primary remove_button">Remover</a></div>';
        	                $(wrapper).append(item); 
        	        } 
        	    });
        });

        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
        });
    });

	
</script>
<body>
	<div id="wrapper">
		<?php $this->load->view('commons/menu'); ?>
		<div id="page-wrapper">
			<div id="page-inner">
				<div class="row" style="margin: 1px;">
					<br>
					<form enctype="multipart/form-data" name="frm"
						action="<?php echo base_url('medicos/cadastrar'); ?>" method="post">
						<div class="form-group">
							<?php $this->load->view('commons/msg_validacao'); ?>	
			
							<label for="nome">Nome:</label> <input class="form-control"
								type="text" id="nome" name="nome"
								value=<?php echo set_value('nome')?>> <label for="nome">CRM:</label><input
								class="form-control" type="text" id="crm" name="crm"
								value=<?php echo set_value('crm')?>> <label for="nome">Telefone:</label>

							<input class="form-control" type="text" id="telefone"
								name="telefone" value=<?php echo  set_value('telefone')?>> <label>Cep</label>
							<input class="form-control" name="cep" type="text" id="cep"
								size="10" value="<?php echo set_value('cep')?>" maxlength="9"
								onblur="pesquisacep(this.value);" /> <label for="nome">Cidade:</label>
							<input class="form-control" type="text" id="cidade" name="cidade"
								value=<?php echo  set_value('cidade')?>> <label for="nome">Estado:</label>
							<input class="form-control" type="text" id="estado" name="estado"
								value=<?php echo set_value('estado')?>> <br>

							<div id="field_especialidades">
								<div>
									<a href="javascript:void(0);" id='add_button'
										class="btn btn-primary">Adicionar Especialidade </a>
								</div>
<?php

if (isset($especialidades) and ! empty($especialidades)) {    
    foreach ($especialidades as $row) {
        ?>
								<div>
									<select class="form-control-inline" style="width: 60%;"
										type="text" name="especialidades[]">

										<option value="">--Selecione--</option>
    <?php
        foreach ($lista_especialidades as $especialidade) {
            ?>
    
												<option
											<?php echo ($row == $especialidade->id) ? 'selected' : '' ?>
											value="<?php echo $especialidade->id;?>"><?php echo $especialidade->nome;?>
					
				</option>

											
<?php
        }
        ?>
        </select><a href="javascript:void(0);"
										class="btn btn-primary remove_button">Remover</a>
								</div>
								<?php
    }
}
?>
							</div>

							<button type="submit" class="btn btn-primary">Salvar</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('commons/rodape'); ?>
</body>
</html>