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
					<h1>Jenis Data</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
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
				<div class="col-2"> </div>
				<div class="col-8">

					<div class="card">
						<!-- <div class="card-header">
							<h3 class="card-title">DataTable with default features</h3>
						</div> -->
						<!-- /.card-header -->
						<div class="card-body">
							<dir class="text-right">
								
							<a href="<?= base_url('jenis/add') ?>" class="btn btn-primary mb-4"><i class="fas fa-plus"></i> Tambah</a>
							</dir>
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th class="text-center" width="5%">No.</th>
										<th class="text-center">Jenis Data</th>
										<th class="text-center">Keterangan</th>
										<th class="text-center">Proses</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 0;
									foreach ($jenisAll as $jAll) :
										$no++;
										// print_r($jAll)
									?>
										<tr>
											<td  class="text-center" scope="row"><?= $no . "."; ?></td>
											<td  class="text-left" ><a href="<?= site_url('jenis/detail/' . $jAll['jenis_id']) ?>"><?= $jAll['jenis_nm']; ?></a></td>
											<td class="text-left" ><a href="<?= site_url('jenis/detail/' . $jAll['jenis_id']) ?>"><?= $jAll['jenis_ket']; ?></a></td>
											<td  class="text-center" >
												<!-- <a href="<?php echo site_url('componen/index/' . $jAll['jenis_id']) ?>" class="badge badge-success"><i class="fas fa-eye"></i></a> | -->
												<!-- <a href="<?php echo site_url('jenis/edit/' . $jAll['jenis_id']) ?>" class="badge badge-warning"><i class="fas fa-edit"></i></a> | -->
												<a onclick="javascript: return confirm('Anda Yakin Ingin Menghapus Data Ini ?') " href="<?= site_url('jenis/hapus/' . $jAll['jenis_id']) ?>" class="badge badge-danger"><i class="fas fa-trash"></i></a>
											</td>
											<!-- <td><a href="<?= site_url('jenis/tesData/' . $jAll['jenis_id']) ?>">Coba Tes Data</a></td> -->
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
