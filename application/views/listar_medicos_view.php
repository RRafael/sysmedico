<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php
$this->load->view('commons/imports_cabecalho');
?>
<link rel="stylesheet"
	href="<?php echo base_url('includes/admin/css/custom.css') ?>" />

<link href='http://fonts.googleapis.com/css?family=Open+Sans'
	rel='stylesheet' type='text/css' />

<link rel="stylesheet" type="text/css"
	href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" />

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script type="text/javascript"
	src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script type="text/javascript"
	src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
	integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
	crossorigin="anonymous"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
	integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
	crossorigin="anonymous">

<link rel="stylesheet"
	href="<?php echo base_url('includes/admin/css/custom.css') ?>" />
<link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
	integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
	crossorigin="anonymous">
<script>
window.onload = function() {
	fechaAlert();
};

function fechaAlert(){
	setTimeout(function() {
		console.log('ok');
	    $(".alert").fadeTo(500, 0).slideUp(500, function(){
	        $(this).remove(); 
	    });
	}, 4000);
}
</script>
</head>
<body>
	<div id="wrapper">
		<?php $this->load->view('commons/menu'); ?>	
		<div id="page-wrapper">
			<div id="page-inner">
				<div class="row" style="margin: 1px;">
					<div class="row">

						<div class="col-md-12">
							<br>
						<?php echo $this->session->flashdata('msg'); ?>
						 <a class="btn btn-primary btn-lg"
								href="<?php echo base_url('medico/cadastrar'); ?>"><i
								class="fas fa-plus"></i> Cadastrar Medico </a><br>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<table id="example" class="display" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Cod.</th>
										<th>Nome</th>
										<th>CRM</th>
										<th>Acões</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

				</div>
			</div>
		</div>
		<script type="text/javascript" charset="utf-8">

    $(document).ready(function () {
        $('#example').DataTable({
        	"ajax": {
                 "url": "<?php echo base_url('medico/listar'); ?>",
                 "type": "POST"
             },
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
            },            
            "order": [[ 0, "desc" ]],
            processing: true,
            stateSave: false,  // salva o estado(pagina) da tabela apos uma acao 
            destroy: true,
            "columns": [
                { "data": "id" },
                { "data": "nome" },
                { "data": "crm" },                  
                {
                 "data": null, 
                 "width": "18%",                
                 "render": function ( data, type, row, meta ) {         
                   		return "<div class='row'><div class='col-md-12'>"+						
                   		" <a class='btn btn-warning btn-xs' href='<?php echo base_url('medico/editar?id=')?>"+ data.id +"'> <i class='far fa-edit'></i>Editar</a>"+
                   		" <a class='btn btn-danger  btn-xs' onclick='return confirm("+'"Tem certeza que deseja deletar este registro?"'+");'  href='<?php echo base_url('medico/deletar?id=')?>"+ data.id +"'> <i class='far fa-trash-alt'></i>Deletar</a>"+
                   		"</div></div>";
                 }
                }                                   
             ]
        });

        $('#example').removeClass('display').addClass('table table-striped table-bordered');
    });

</script>
	</div>
	<?php $this->load->view('commons/rodape'); ?>
</body>
</html>