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
							<button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#addModal-baris"><i class="fas fa-plus"></i> Tambah Data</button>
							<table id="table" class="table table-bordered table-striped">
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
										$no++;
									?>
										<tr>
											<td scope="row"><?= $no; ?>.</td>
											<td><?= $data->baris_nm; ?></td>
											<td>
												<button data-toggle="modal" class="btn btn-info btn-sm btn-edit-baris" data-id="<?= $data->baris_id; ?>" data-name="<?= $data->baris_nm; ?>"><i class="fas fa-edit"></i></button> |
												<button data-toggle="modal" class="btn btn-danger btn-sm btn-delete-baris" data-id="<?= $data->baris_id; ?>"><i class="fas fa-trash"></i></button>
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

				<!-- Kolom -->
				<div class="col-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Kolom Data</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#addModal-kolom"><i class="fas fa-plus"></i> Tambah Data</button>
							<table id="table1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No.</th>
										<th>Kolom</th>
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
											<td>
												<button data-toggle="modal" class="btn btn-info btn-sm btn-edit-kolom" data-id="<?= $data->kolom_id; ?>" data-name="<?= $data->kolom_nm; ?>"><i class="fas fa-edit"></i></button> |
												<button data-toggle="modal" class="btn btn-danger btn-sm btn-delete-kolom" data-id="<?= $data->kolom_id; ?>"><i class="fas fa-trash"></i></button>
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
</div>
<!-- /.content-wrapper -->

<!-- Baris Section Modal -->

<!-- Modal Tambah Baris-->
<form action="<?= site_url('componen/add_baris/' . $tabel->tabel_id) ?>" method="post">
	<input type="hidden" name="tabel_id" value="<?= $tabel->tabel_id; ?>">
	<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<!-- Modal Edit Baris-->
<form action="<?= site_url('componen/edit_baris/' . $tabel->tabel_id) ?>" method="post">
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
						<label>Nama Baris</label>
						<input type="text" class="form-control baris_nm" name="baris_nm" placeholder="Nama Baris">
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="tabel_id" value="<?= $tabel->tabel_id; ?>">
					<input type="hidden" name="baris_id" class="form-control baris_id">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- End Modal Edit Product-->

<!-- Modal Delete Baris-->
<form action="<?= site_url('componen/delete_baris/' . $tabel->tabel_id) ?>" method="post">
	<input type="hidden" name="tabel_id" value="<?= $tabel->tabel_id; ?>">
	<input type="hidden" name="baris_id" class="baris_id">

	<div class="modal fade" id="deleteModal-baris" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h4>Apakah Anda Ingin Menghapus Baris ini ?</h4>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
					<button type="submit" class="btn btn-primary">Yes</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- End Modal Delete Baris -->

<!-- End Baris Section Modal -->

<!-- kolom Section Modal -->

<!-- Modal Tambah kolom-->
<form action="<?= site_url('componen/add_kolom/' . $tabel->tabel_id) ?>" method="post">
	<input type="hidden" name="tabel_id" value="<?= $tabel->tabel_id; ?>">
	<div class="modal fade" id="addModal-kolom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- End Modal Tambah kolom-->

<!-- Modal Edit kolom-->
<form action="<?= site_url('componen/edit_kolom/' . $tabel->tabel_id) ?>" method="post">
	<div class="modal fade" id="editModal-kolom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
						<label>Nama Kolom</label>
						<input type="text" class="form-control kolom_nm" name="kolom_nm">
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="tabel_id" value="<?= $tabel->tabel_id; ?>">
					<input type="hidden" name="kolom_id" class="form-control kolom_id">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- End Modal Edit Product-->

<!-- Modal Delete kolom-->
<form action="<?= site_url('componen/delete_kolom/' . $tabel->tabel_id) ?>" method="post">
	<input type="hidden" name="tabel_id" value="<?= $tabel->tabel_id; ?>">
	<input type="hidden" name="kolom_id" class="kolomID">

	<div class="modal fade" id="deleteModal-kolom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Delete Kolom</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h4>Are you sure want to delete this product?</h4>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
					<button type="submit" class="btn btn-primary">Yes</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- End Modal Delete Baris -->

<!-- End Baris Section Modal -->


<?php
$this->load->view('layout/footer');
?>
<script>
	$(document).ready(function() {

		// get Edit Baris
		$('.btn-edit-baris').on('click', function() {
			// get data from button edit
			const id = $(this).data('id');
			const name = $(this).data('name');
			// Set data to Form Edit
			$('.baris_id').val(id);
			$('.baris_nm').val(name);
			// Call Modal Edit
			$('#editModal-baris').modal('show');
		});

		// get Delete Baris
		$('.btn-delete-baris').on('click', function() {
			// get data from button edit
			const id = $(this).data('id');
			// Set data to Form Edit
			$('.baris_id').val(id);
			// Call Modal Edit
			$('#deleteModal-baris').modal('show');
		});

		// get Edit Kolom
		$('.btn-edit-kolom').on('click', function() {
			// get data from button edit
			const id = $(this).data('id');
			const name = $(this).data('name');
			// Set data to Form Edit
			$('.kolom_id').val(id);
			$('.kolom_nm').val(name);
			// Call Modal Edit
			$('#editModal-kolom').modal('show');
		});

		// get Delete kolom
		$('.btn-delete-kolom').on('click', function() {
			// get data from button edit
			const id = $(this).data('id');
			// Set data to Form Edit
			$('.kolomID').val(id);
			// Call Modal Edit
			$('#deleteModal-kolom').modal('show');
		});
	});
</script>
