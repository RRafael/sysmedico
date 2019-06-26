<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="adjust-nav">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse"
				data-target=".sidebar-collapse">
				<span class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>


		</div>

		<span class="logout-spn"> <a
			href="<?php echo base_url('admin/home/logout'); ?>"
			style="color: #fff;">Sair do Sistema</a>
		</span>
	</div>
</div>
<!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav" id="main-menu">
			<li
				<?php echo (isset($menu_ativo) and $menu_ativo == 'inicio') ? "class='active-link'" : ''; ?>><a
				href="<?php echo (isset($menu_ativo) and $menu_ativo == 'inicio') ? '#' : base_url('home'); ?>"><i
					class="fa fa-desktop "></i>Início</a></li>

			<li
				<?php echo (isset($menu_ativo) and $menu_ativo == 'medicos') ? "class='active-link'" : ''; ?>><a
				href="<?php echo (isset($menu_ativo) and $menu_ativo == 'medicos') ? '#' : base_url('medico'); ?>"><i
					class="fa fa-users "></i>Medicos</a></li>

		</ul>
	</div>

</nav>
<!-- /. NAV SIDE  -->