<?php
$this->load->view('layout/header');

$this->load->view('layout/sidebar.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Edit Data</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Edit Data</li>
					</ol>
				</div>
			</div>
		</div>
		<!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">

					<!-- Horizontal Form -->
					<div class="card card-info">
						<div class="card-header">
							<h3 class="card-title">Form</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form class="form-horizontal" method="POST">
							<div class="card-body">
								<input type="hidden" name="id" value="<?= $tabel->tabel_id; ?>">
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Tabel</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="tabel_nm" value="<?= $tabel->tabel_nm; ?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Nama Unit</label>
									<div class="col-sm-10">
										<select class="custom-select" name="unit_id">
											<option>-- Pilih --</option>
											<?php foreach ($datalist as $row) : ?>
												<option class="form-control" value="<?= $row->unit_id ?>"><?= $row->unit_id ?> - <?= $row->unit_nama; ?></option> <?php endforeach; ?>
										</select> </div>
								</div>
							</div> <!-- /.card-body -->
							<div class="card-footer">
								<button type="submit" class="btn btn-info text-white">Save</button>
							</div>
							<!-- /.card-footer -->
						</form>
					</div>
