

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
										<input type="text" class="form-control" placeholder="Tabel" name="tabel_nm" required="">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Jenis Data</label>
									<div class="col-sm-6">
										<select  class="form-control" name="jenis_id" required="">
											<option class="form-control" value="">Pilih Jenis Data</option>
											<?php
											foreach ($jenis as $jns) {
												?>
												<option class="form-control" value="<?=$jns['jenis_id']?>"><?=$jns['jenis_nm']." (".$jns['jenis_ket'].")"?></option>
												<?php
											}
											?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Nama Unit</label>
									<div class="col-sm-10">

									<select  class="form-control" name="unit_id" required="">
											<option class="form-control" value="">Pilih OPD</option>
											<?php
											foreach ($unit as $unt) {
												?>
												<option class="form-control" value="<?=$unt->unit_id?>"
			
													><?=$unt->unit_nama?></option>
												<?php
											}
											?>
											<option class="form-control" value="99">Lainnya / Instansi Vertical</option>
										</select>


									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Ketegori</label>
									<div class="col-sm-10">

										<select class="form-control" placeholder="Tabel" name="kategori_id">
										<option value="">- Pilih Kategori -</option>
											<?php
											foreach ($kategori_default as $row) :
												?>
													<option value="<?=$row->kategori_id?>"><?=$row->kategori_nama?></option>
												<?php
											endforeach;
											?>
											
										</select>

									</div>
								</div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<button type="submit" class="btn btn-info text-white">Input</button>
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
<!-- <div id="modal" class="modal fade" role="dialog">
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

 -->
<!-- 
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
 -->