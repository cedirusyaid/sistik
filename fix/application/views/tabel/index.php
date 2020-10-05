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
					<h1>Tabel</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Tabel</li>
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
						<!-- <div class="card-header">
							<h3 class="card-title">DataTable with default features</h3>
						</div> -->
						<!-- /.card-header -->
						<div class="card-body">
							<a href="<?= base_url('tabel/add') ?>" class="btn btn-primary mb-4"><i class="fas fa-plus"></i> Tambah Data</a>
							<table id="table" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th class="text-center">No.</th>
										<th class="text-center">Tabel</th>
										<!-- <th class="text-center">Nama Unit</th> -->
										<th class="text-center">Jenis</th>
										<th class="text-center">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 0;
									foreach ($tabel as $data) :
										$no++;
										// print_r($data)
									?>
										<tr>
											<td scope="row"><?= $no . "."; ?></td>
											<td><a href="<?= site_url('tabel/detail/' . $data['tabel_id']) ?>"><?= $data['tabel_nm']; ?></a></td>
											<!-- <td><?= $data['unit_nm']; ?></td> -->
											<td><?= $data['jenis_nm']; ?></td>
											<td>
												<a href="<?php echo site_url('compt/index/' . $data['tabel_id']) ?>" class="badge badge-success"><i class="fas fa-eye"></i></a> |
												<a href="<?php echo site_url('tabel/edit/' . $data['tabel_id']) ?>" class="badge badge-warning"><i class="fas fa-edit"></i></a> |
												<a onclick="javascript: return confirm('Anda Yakin Ingin Menghapus Data Ini ?') " href="<?= site_url('tabel/hapus/' . $data['tabel_id']) ?>" class="badge badge-danger"><i class="fas fa-trash"></i></a>
											</td>
											<!-- <td><a href="<?= site_url('tabel/tesData/' . $data['tabel_id']) ?>">Coba Tes Data</a></td> -->
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

<?php
$this->load->view('layout/footer');
?>
