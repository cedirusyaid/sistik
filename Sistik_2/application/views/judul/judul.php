<?php
$this->load->view('layout/header');

$this->load->view('layout/sidebar.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Dashboard</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard v1</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<a href="<?php echo site_url('judul/tambah') ?>" class="float-right"><i class="fas fa-plus"></i> Tambah Judul</a>
				<br>
				<h2>Judul</h2>
				<table class="table table-hover table-bordered" id="example">
					<thead>
						<tr>
							<th>No.</th>
							<th>Judul</th>
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
								<td><?= $data['judul_nm']; ?></td>
								<td>
									<a href="<?php echo site_url('judul/edit/' . $data['judul_id']) ?>"><i class="fas fa-edit"></i> Edit</a> |

									<a onclick="javascript: return confirm('Anda Yakin Ingin Menghapus Data Ini ?') " href="<?= site_url('judul/hapus/' . $data['judul_id']) ?>"><i class="fas fa-trash"></i> Hapus</a>
									<!-- <a href="<?php echo site_url('judul/hapus/' . $data['judul_id']) ?>">Hapus</a> -->
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
			<!-- /.row -->
			<!-- Main row -->

			<!-- /.row (main row) -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
