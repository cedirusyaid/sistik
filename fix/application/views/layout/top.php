<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?=SITE_NAME?></title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('asset/'); ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('asset/'); ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>" />
  <link rel="stylesheet" href="<?= base_url('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>" />




  
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-dark navbar-black">
    <div class="container">
      <a href="<?= base_url(''); ?>" class="navbar-brand">
        <i class="fas fa-chart-bar"></i>

        <!-- <img src="<?= base_url('asset/'); ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8"> -->
        <span class="brand-text font-weight-light"><?=SITE_NAME?></span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
    



      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

        <!-- USER -->
        <?php if ($this->session->userdata('is_logged_in')) { ?>
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <?= $this->session->userdata('nama')?></i>
          </a>

          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">Profil</a>
            <div class="dropdown-divider"></div>
            <a href="<?php echo base_url('user/logout'); ?>" class="dropdown-item">Logout</a>
           </div>
		        <li class="nav-item">
		          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
		              class="fas fa-cog"></i></a>
		        </li>
        </li>
        <?php } else { ?>
        	<li class="nav-item">
	          <a class="nav-link" href="<?php echo base_url('user/login'); ?>"><i
                  class="fas fa-sign-in-alt"></i> login </a>
          </li>
        <?php } ?>





      </ul>
    </div>
  </nav>
  <!-- /.navbar -->
    <div class="container">
<div class="content-wrapper">
