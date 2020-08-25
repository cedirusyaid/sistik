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
					<h1>Tambah Data</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Tambah Data</li>
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
						<form class="form-horizontal" action="<?= site_url('tabel/add') ?>" method="POST">
							<div class="card-body">
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Tabel</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" placeholder="Tabel" name="tabel_nm">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Nama Unit</label>
									<div class="col-sm-10">
										<div class="input-group">
											<input type="text" class="form-control mr-4 col-sm-3" id="unit_id" name="unit_id" placeholder="Unit ID" readonly>
											<input type="text" class="form-control mr-4 col-sm-7" id="unit_nm" name="unit_nm" placeholder="Nama Unit" readonly>
											<span class="input-group-btn">
												<button type="button" class="btn btn-info btn-flat ml-4 btn-browse" data-toggle="modal" data-target="#modal">Browse</button>
											</span>
										</div>
									</div>
								</div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<button type="submit" class="btn btn-info text-white">Kirim</button>
							</div>
							<!-- /.card-footer -->
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- Modal Pilih Unit -->
<div id="modal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form method="post" action="">
				<div class="modal-header">
					<center>
						<h3 class="modal-title">Pilih Unit</h3>
					</center>
				</div>
				<div class="modal-body">
					<table class="table table-hover nowrap text-center" id="example" style="width: 100%;">
						<thead>
							<tr>
								<th>No</th>
								<th>Unit ID</th>
								<th width=100px>Nama Unit</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 0;
							foreach ($datalist as $row) :
								$no++; ?>
								<tr id="unit" data-kode="<?= $row->unit_id; ?>" data-nama="<?= $row->unit_nama; ?>">
									<td><?= $no ?></td>
									<td><?= $row->unit_id ?></td>
									<td><?= $row->unit_nama ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				</div>
		</div>
	</div>
</div>

<?php $this->load->view('layout/footer'); ?>

<script>
	$(document).ready(function() {
		$('#example').DataTable({
			responsive: true
		});

		$(document).on('click', '#unit', function(e) {
			document.getElementById("unit_id").value = $(this).attr('data-kode');
			document.getElementById("unit_nm").value = $(this).attr('data-nama');
			$('#modal').modal('hide');
		});
	});
</script>
