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
<body>
	<div id="wrapper">
		<?php $this->load->view('commons/menu'); ?>
		<div id="page-wrapper">
			<div id="page-inner">
				<div class="row" style="margin: 1px;">
					<br>
					<form action="<?php echo base_url('medico/atualizar'); ?>"
						method="post" name="frm">
						<div class="form-group">
							<?php $this->load->view('commons/msg_validacao'); ?>	
							<div class="row">
								<div class="form-group col-md-4">
									<input type="hidden" name="id" id="id"
										value=<?php echo (isset($medico->id) and ! empty($medico->id)) ? $medico->id : set_value('id')?>>

									<label for="nome">Nome:</label> <input class="form-control"
										type="text" id="nome" name="nome"
										value=<?php echo (isset($medico->nome) and ! empty($medico->nome)) ? $medico->nome : set_value('nome')?>>

									<label for="nome">CRM:</label> <input class="form-control"
										type="text" id="crm" name="crm"
										value=<?php echo (isset($medico->crm) and ! empty($medico->crm)) ? $medico->crm : set_value('crm')?>>

									<label for="nome">Telefone:</label> <input class="form-control"
										type="text" id="telefone" name="telefone"
										value=<?php echo (isset($medico->telefone) and ! empty($medico->telefone)) ? $medico->telefone : set_value('telefone')?>>


									<label for="nome">Cidade:</label> <input class="form-control"
										type="text" id="cidade" name="cidade"
										value=<?php echo (isset($medico->cidade) and ! empty($medico->cidade)) ? $medico->cidade : set_value('cidade')?>>

									<label for="nome">Estado:</label> <input class="form-control"
										type="text" id="estado" name="estado"
										value=<?php echo (isset($medico->estado) and ! empty($medico->estado)) ? $medico->estado : set_value('estado')?>>

									<br>
									<button type="submit" class="btn btn-primary">Salvar e Voltar
										para a Lista</button>

									<a href="<?php echo base_url('medico')?>" class="btn btn-default">Cancelar</a>
								</div>
							</div>
						</div>


					</form>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('commons/rodape'); ?>
</body>
</html>