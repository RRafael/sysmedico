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
<script
	src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.10/angular.min.js"></script>
<script src="<?php echo base_url('includes/js/ngMask.min.js') ?>"></script>

<link rel="stylesheet"
	href="<?php echo base_url('includes/admin/css/bootstrap.css') ?>">
<link rel="stylesheet"
	href="<?php echo base_url('includes/admin/css/custom.css') ?>" />
<link rel="stylesheet"
	href="<?php echo base_url('includes/admin/css/font-awesome.css') ?>" />
</head>
<body>
	<div id="wrapper">
		<?php $this->load->view('commons/menu'); ?>
		<div id="page-wrapper">
			<div id="page-inner">
				<div class="row" style="margin: 1px;">
					<br>
					<form enctype="multipart/form-data" name="frm"
						action="<?php echo base_url('medico/cadastrar'); ?>" method="post">
						<div class="form-group">
							<?php $this->load->view('commons/msg_validacao'); ?>	
			
							<label for="nome">Nome:</label> <input class="form-control"
								type="text" id="nome" name="nome"
								value=<?php echo set_value('nome')?>> <label for="nome">CRM:</label><input
								class="form-control" type="text" id="crm" name="crm"
								value=<?php echo set_value('crm')?>> <label for="nome">Telefone:</label>

							<input class="form-control" type="text" id="telefone"
								name="telefone" value=<?php echo  set_value('telefone')?>> <label
								for="nome">Cidade:</label> <input class="form-control" 
								type="text" id="cidade" name="cidade"
								value=<?php echo  set_value('cidade')?>> <label for="nome">Estado:</label>
							<input class="form-control" type="text" id="estado" name="estado"
								value=<?php echo set_value('estado')?>> <br>
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