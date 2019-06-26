<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">

<?php

function bootstrap()
{
    ?>
<link rel="stylesheet"
	href="<?php echo base_url('includes/admin/css/bootstrap.css') ?>">

<link rel="stylesheet"
	href="<?php echo base_url('includes/admin/css/font-awesome.css') ?>" />
<?php
}
?>


<?php

function angularjs()
{
    ?>
<script
	src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.10/angular.min.js"></script>

<script src="<?php echo base_url('includes/js/ngMask.min.js') ?>"></script>
<?php
}
?>


<?php

function cssDashBoard()
{
    ?>
<link href='http://fonts.googleapis.com/css?family=Open+Sans'
	rel='stylesheet' type='text/css' />
<link rel="stylesheet"
	href="<?php echo base_url('includes/admin/css/custom.css') ?>" />
<?php
}
?>
