  <!-- Control Sidebar -->
<aside class="control-sidebar">
<div class="sidebar">
	<!-- Sidebar Menu -->
	<nav class="mt-2">
		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
			<!-- Add icons to the links using the .nav-icon class
				with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?= base_url('tabel'); ?>"  class="nav-link">
						<i class="nav-icon fas fa-th"></i>
						<p>Tabel</p>
					</a>
				</li>

				<li class="nav-item has-treeview menu-open">
					<a href="<?= base_url(''); ?>" class="nav-link">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Admin
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url('jenis'); ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Jenis Data</p>
							</a>
						</li>
<!-- 						<li class="nav-item">
							<a href="<?= base_url('user'); ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>user</p>
							</a>
						</li> -->
					</ul>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>

  </aside>
  <!-- /.control-sidebar -->


