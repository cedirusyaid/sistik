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
					<h1>Judul</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Judul</li>
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

					<div class="card">
						<div class="card-header">
							<h3 class="card-title">DataTable with default features</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<a href="<?= base_url('judul/tambah') ?>" class="btn btn-primary mb-4"><i class="fas fa-plus"></i> Tambah Data</a>
							<table id="table" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No.</th>
										<th>Judul</th>
										<th>Unit</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 0;
									foreach ($judul as $data) :
										$no++;
									?>
										<tr>
											<td scope="row"><?= $no . "."; ?></td>
											<td><?= $data['tabel_nm']; ?></td>
											<td><?= $data['unit_id']; ?></td>
											<td>
												<a href="<?php echo site_url('judul/edit/' . $data['tabel_id']) ?>" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a> |
												<a onclick="javascript: return confirm('Anda Yakin Ingin Menghapus Data Ini ?') " href="<?= site_url('judul/hapus/' . $data['tabel_id']) ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
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
