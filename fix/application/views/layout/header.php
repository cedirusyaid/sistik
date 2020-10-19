<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Statistik</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url('asset/plugins/fontawesome-free/css/all.min.css'); ?>">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bbootstrap 4 -->
	<link rel="stylesheet" href="<?= base_url('asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?= base_url('asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
	<!-- JQVMap -->
	<link rel="stylesheet" href="<?= base_url('asset/plugins/jqvmap/jqvmap.min.css'); ?>">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?= base_url('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>" />
	<link rel="stylesheet" href="<?= base_url('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>" />
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('asset/dist/css/adminlte.min.css'); ?>">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?= base_url('asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?= base_url('asset/plugins/daterangepicker/daterangepicker.css'); ?>">
	<!-- summernote -->
	<link rel="stylesheet" href="<?= base_url('asset/plugins/summernote/summernote-bs4.css'); ?>">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="<?=base_url()?>" class="nav-link">Home</a>
				</li>
			</ul>

			<!-- SEARCH FORM -->
			<form class="form-inline ml-3">
				<div class="input-group input-group-sm">
					<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
					<div class="input-group-append">
						<button class="btn btn-navbar" type="submit">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</div>
			</form>


      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
<!--           <li class="dropdown notifications-menu">
            <a href="<?php echo base_url(); ?>#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="<?php echo base_url(); ?>#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="<?php echo base_url(); ?>#">View all</a></li>
            </ul>
          </li> -->
          <!-- User Account: style can be found in dropdown.less -->
          <li style = "line-height: 50px">
            <form class="form-inline my-2 my-lg-0" action="<?php echo base_url('data/cari') ?>" method="get" >
            <input class="form-control mr-sm-2" type="search" name="key" placeholder="Cari NIK/KK/Nama" aria-label="Search" value="<?php if($this->input->get('key')){echo $this->input->get('key');} ?>">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </li>
          <li>
            <a href="<?php echo base_url(); ?>#" data-toggle="modal" data-target="#info_web"><i class="fa  fa-info-circle"></i></a>
          </li>
          <li class="dropdown user user-menu">
            <?php if ($this->session->userdata('is_logged_in')) { ?>
                <a href="<?php echo base_url(); ?>#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs"><?= $this->session->userdata('nama')?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="footer"><a href="#">Profile</a></li>
                  <li class="footer"><a href="<?php echo base_url('user/logout'); ?>">Logout</a></li>
                </ul>
            <?php } else { ?>
                  <li class="footer"><a href="<?php echo base_url('user/login'); ?>">Login</a></li>
            <?php } ?>

          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>		




		</nav>
		<!-- /.navbar -->
