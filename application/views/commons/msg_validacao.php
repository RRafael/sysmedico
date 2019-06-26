<?php if ((isset($erros) and !empty($erros)) and $erros){ ?>
<div class="alert alert-danger">
	<strong>
			<?= $erros; ?>
			</strong>
</div>
<?php } ?>

<?php if ((isset($sucesso) and !empty($sucesso)) and $sucesso){ ?>
<div class="alert alert-success">
		<?= $sucesso; ?>	
		</div>
<?php } ?>

