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
					<h1>Komponen <?= $tabel->tabel_nm; ?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Komponen</li>
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

				<!-- Baris -->
				<div class="col-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Baris Data</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#addModalBaris"><i class="fas fa-plus"></i> Tambah Data</button>
							<table id="" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No.</th>
										<th>Baris</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 0;
									foreach ($baris as $data) :
										if ($data->baris_induk == 0) {
										$no++;
									?>
										<tr>
											<td scope="row"><?= $no; ?>.</td>
											<td><?= $data->baris_nm; ?></td>
											<td>
												<a href="#" class="btn btn-info btn-sm btn-edit editbaris" data-id="<?= $data->baris_id; ?>" data-name="<?= $data->baris_nm; ?>"><i class="fas fa-edit"></i></a> |
												<a href="#" class="btn btn-danger btn-sm btn-delete hapusbaris" data-id="<?= $data->baris_id; ?>"><i class="fas fa-trash"></i></a>
											</td>
										</tr>
										<?php
											foreach ($baris as $data1) :
												if ($data1->baris_induk == $data->baris_id) {
											?>
													<tr>
														<td></td>
														<td><?= $data1->baris_nm; ?></td>
														<td>
															<button data-toggle="modal" class="btn btn-info btn-sm btn-edit-baris" data-id="<?= $data1->baris_id; ?>" data-name="<?= $data1->baris_nm; ?>"><i class="fas fa-edit"></i></button> |
															<button data-toggle="modal" class="btn btn-danger btn-sm btn-delete-baris" data-id="<?= $data1->baris_id; ?>"><i class="fas fa-trash"></i></button>
														</td>
													</tr>
									<?php
												}
											endforeach;
										}
									endforeach ?>
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>

				<!-- Kolom -->
				<div class="col-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Kolom Data</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#addModalKolom"><i class="fas fa-plus"></i> Kolom Data</button>
							<table id="table1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No.</th>
										<th>Kolom</th>
										<th>Tipe</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 0;
									foreach ($kolom as $data) :
										$no++;
									?>
										<tr>
											<td scope="row"><?= $no; ?>.</td>
											<td><?= $data->kolom_nm; ?></td>
											<td><?= $data->kolom_tipe;?></td>
											<td>
												<button class="btn btn-info btn-sm btn-edit editkolom" data-toggle="modal" data-id="<?= $data->kolom_id; ?>" data-name="<?= $data->kolom_nm; ?>" data-tipe="<?= $data->kolom_tipe; ?>"><i class="fas fa-edit"></i></button> |
												<button class="btn btn-danger btn-sm btn-delete hapuskolom" data-id="<?= $data->kolom_id; ?>"><i class="fas fa-trash"></i></button>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
	<div class="text m-3">
		<p class="text-monospace">
			Untuk Melihat Nilai Baris dan Kolom Silahkan <a href="<?= base_url('tabel/detail/'.$tabel->tabel_id)?>"> Klik Disini </a>
		</p>
	</div>
</div>
<!-- /.content-wrapper -->

<!-- Modal Tambah Baris-->
<form action="<?= site_url('componen/add_baris/' . $tabel->tabel_id) ?>" method="post">
	<input type="hidden" name="tabel_id" value="<?= $tabel->tabel_id; ?>">
	<div class="modal fade" id="addModalBaris" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Baris</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Baris Induk</label>
						<div class="dropdown bootstrap-select dropdown w-100">
							<select class="form-control" name="baris_induk">
								<option>Pilih Baris Induk</option>
								<?php
								foreach ($baris as $data) :
									if ($data->baris_induk == 0) { ?>
										<option value="<?= $data->baris_id ?>"><?= $data->baris_nm ?></option>
								<?php };
								endforeach ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label>Nama Baris</label>
						<input type="text" class="form-control" name="baris_nm" placeholder="Nama Baris">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- End Modal Tambah Baris-->

<!-- Modal Tambah Kolom-->
<form action="<?= site_url('componen/add_kolom/' . $tabel->tabel_id) ?>" method="post">
	<input type="hidden" name="tabel_id" value="<?= $tabel->tabel_id; ?>">
	<div class="modal fade" id="addModalKolom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Kolom</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nama Kolom</label>
						<input type="text" class="form-control" name="kolom_nm" placeholder="Nama Kolom">
					</div>

					<div class="form-group">
					<label>Tipe Kolom</label><br>
						<label class="radio-inline">
							<input type="radio" name="kolom_tipe" value="1">
							Angka
						</label>
						<label class="radio-inline">
							<input type="radio" name="kolom_tipe" value="2" >
							Text
						</label>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- End Modal Tambah Kolom-->

<!-- Modal Edit Baris-->
<form action="<?= site_url('componen/edit_baris/' . $tabel->tabel_id) ?>" method="post">
	<input type="hidden" name="tabel_id" value="<?= $tabel->tabel_id; ?>">
	<input type="hidden" class="form-control baris_id" name="baris_id">

	<div class="modal fade" id="editModalBaris" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Baris Induk</label>
						<div class="dropdown bootstrap-select dropdown w-100">
							<select class="form-control" name="baris_induk" disabled>			
								<option value="0">Pilih Baris Induk</option>
								
								<?php
								foreach ($baris as $data2) : ?>
									<?php if ($data2->baris_induk == 0 and $data2->baris_induk !== $data2->baris_id) { ?>
										
										<option value="<?= $data2->baris_id ?>" <?php if ($data2->baris_id !== $data2->baris_induk) {
																															echo "";
																														}
																														?>>
											<?= $data2->baris_nm ?>
										</option>
								<?php };
								endforeach ?>
							
							</select>
						</div>
					</div>
					<div class="form-group">
						<label>Nama Baris</label>
						<input type="text" class="form-control baris_nm" name="baris_nm" placeholder="Nama Baris">
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- End Modal Edit Baris-->

<!-- Modal Edit kolom-->
<form action="<?= site_url('componen/edit_kolom/' . $tabel->tabel_id) ?>" method="post">
	<input type="hidden" name="tabel_id" value="<?= $tabel->tabel_id; ?>">
	<input type="hidden" class="form-control kolom_id" name="kolom_id">

	<div class="modal fade" id="editModalKolom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>



				<div class="modal-body">
					<div class="form-group">
						<label>Nama kolom</label>
						<input type="text" class="form-control kolom_nm" name="kolom_nm" placeholder="Nama kolom">
					</div>
					<div class="form-group">
					<label>Tipe Kolom</label><br>
						<label class="radio-inline">
							<input type="radio" name="kolom_tipe" id="" value="1" <?php if($data['kolom_tipe'] == "Angka") echo"checked"?>>
							Angka
						</label>
						<label class="radio-inline">
							<input type="radio" name="kolom_tipe" id="" value="2" <?php if ($data['kolom_tipe'] == "Text") echo"checked"?>>
							Text
						</label>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- End Modal Edit kolom-->

<!-- Modal Delete Baris-->
<form action="<?= site_url('componen/delete_baris/' . $tabel->tabel_id) ?>" method="post">
	<input type="hidden" name="tabel_id" value="<?= $tabel->tabel_id; ?>">
	<input type="hidden" class="form-control baris_id" name="baris_id">


	<div class="modal fade" id="deleteModalBaris" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<h4>Apakah Anda Yakin Ingin Menghapus Data</h4>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
					<button type="submit" class="btn btn-primary">Yes</button>
				</div>
			</div>
		</div>
	</div>
</form>

<!-- Modal Delete Kolom-->
<form action="<?= site_url('componen/delete_kolom/' . $tabel->tabel_id) ?>" method="post">
	<input type="hidden" name="tabel_id" value="<?= $tabel->tabel_id; ?>">
	<input type="hidden" class="form-control kolom_id" name="kolom_id">

	<div class="modal fade" id="deleteModalKolom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<h4>Apakah Anda Yakin Ingin Menghapus Data</h4>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
					<button type="submit" class="btn btn-primary">Yes</button>
				</div>
			</div>
		</div>
	</div>
</form>

<?php
$this->load->view('layout/footer');
?>
<script>
	$(document).ready(function() {

		// get Edit modal baris
		$('.editbaris').on('click', function() {
			// get data from button edit
			const id = $(this).data('id');
			const name = $(this).data('name');
			// Set data to Form Edit
			$('.baris_id').val(id);
			$('.baris_nm').val(name);
			// Call Modal Edit
			$('#editModalBaris').modal('show');
		});

		// get Edit modal kolom
		$('.editkolom').on('click', function() {
			// get data from button edit
			const id = $(this).data('id');
			const name = $(this).data('name');
			const tipe = $(this).data('tipe');
			// Set data to Form Edit
			$('.kolom_tipe').val(tipe);
			$('.kolom_id').val(id);
			$('.kolom_nm').val(name);
			// Call Modal Edit
			$('#editModalKolom').modal('show');
		});

		// get Delete Baris
		$('.hapusbaris').on('click', function() {
			// get data from button edit
			const id = $(this).data('id');
			// Set data to Form Edit
			$('.baris_id').val(id);
			// Call Modal Edit
			$('#deleteModalBaris').modal('show');
		});

		// get Delete Kolom
		$('.hapuskolom').on('click', function() {
			// get data from button edit
			const id = $(this).data('id');
			// Set data to Form Edit
			$('.kolom_id').val(id);
			// Call Modal Edit
			$('#deleteModalKolom').modal('show');
		});

	});
</script>
