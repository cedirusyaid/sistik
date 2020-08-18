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
						<div class="card-header text-center">
							<h3 class="card-title"><?= $detail->tabel_nm; ?></h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="table" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Data Statis</th>
										<th>Unit</th>
										<th>Baris</th>
										<th>Kolom</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td></td>
										<td><?= $detail->unit_id; ?></td>
										<td>
											<?php
											$no = 0;
											foreach ($baris as $data) :
												$no++;
											?>
												- <?= $data->baris_nm ?> <br>
											<?php endforeach ?>
										</td>
									</tr>
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
