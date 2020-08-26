<?php
$this->load->view('layout/header');

$this->load->view('layout/sidebar.php');

// $this->load->model('m_isi');
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
							<h1 class="card-title"><?= $detail->tabel_nm; ?></h1>
							<a href="<?= base_url('tabel/edit_detail/' . $tabel_id) . '/' . $tahun ?>" class="btn btn-primary float-right">
								<i class="fas fa-edit"></i>
							</a>
						</div>
						<div class="card-header">
							<h3 class="card-title col-md-2">Tahun : </h3>
							<select class="form-control col-md-2" name="" id="" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
								<?php
								for ($i = $tahun_awal; $i <= $tahun; $i++) { ?>
									<option value="<?= base_url('tabel/detail/' . $tabel_id . "/" . $i) ?>" <?php
																																													if ($i == $tahun) {
																																														echo " selected";
																																													}
																																													?>>
										<?= $i; ?>
									</option>
								<?php
								}
								?>
							</select>
						</div>

						<!-- /.card-header -->
						<div class="card-body">
							<table id="table" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Uraian</th>
										<?php
										$no = 0;
										foreach ($kolom as $data) :
											$no++;
										?>
											<th><?= $data->kolom_nm ?></th>
										<?php endforeach ?>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 0;
									foreach ($baris as $brs) :
										if ($brs->baris_induk == 0) {
											$no++;
									?>
											<tr>
												<td><?= $no ?></td>
												<td>
													<?= $brs->baris_nm ?>
												</td>
												<?php
												foreach ($kolom as $klm) :
													$isi = $this->m_isi->isi_value($tabel_id, $klm->kolom_id, $brs->baris_id, $tahun);
													if (isset($isi)) {
														$value = $isi->isi_value;
													} else {
														$value = "";
													}
												?>
													<td><?= $value  ?></td>
												<?php endforeach ?>
											</tr>
											<?php
											foreach ($baris as $data1) :
												if ($data1->baris_induk == $brs->baris_id) {
											?>
													<tr>
														<td></td>
														<td><?= $data1->baris_nm; ?></td>
													</tr>
											<?php };
											endforeach ?>
									<?php };
									endforeach ?>
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

