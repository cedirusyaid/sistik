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
							<h3 class="card-title"><?= $detail->tabel_nm; ?> Tahun <?= $tahun ?></h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<form action="<?= base_url('tabel/proses_detail/') ?>" method="post">
								<input type="hidden" name="tahun" value="<?= $tahun ?>">
								<input type="hidden" name="tabel_id" value="<?= $tabel_id ?>">
								<table id="" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th class="text-center">No</th>
											<th class="text-center">Uraian</th>
											<?php
											$no = 0;
											foreach ($kolom as $klm) :
												$no++;
											?>
												<th class="text-center"><?= $klm->kolom_nm ?></th>
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
													<td colspan="3"></td>

												</tr>
												<?php
												foreach ($baris as $data1) :
													if ($data1->baris_induk == $brs->baris_id) {
												?>
														<tr>
															<td></td>
															<td><?= $data1->baris_nm; ?></td>
															<?php
															foreach ($kolom as $klm) :
																$isi = $this->m_isi->isi_value($tabel_id, $klm->kolom_id, $brs->baris_id, $tahun);
																if (isset($isi)) {
																	$value = $isi->isi_value;
																} else {
																	$value = "";
																}
															?>
																<td>
																	<input type="text" class="form-control" name="<?php echo 'isi_' . $klm->kolom_id . '_' . $brs->baris_id; ?>" value="<?= $value  ?>">
																</td>
															<?php endforeach ?>
														</tr>
												<?php };
												endforeach ?>
										<?php };
										endforeach ?>
									</tbody>
								</table>
								<div class="d-flex justify-content-center">
									<button type="submit" value="" class="btn btn-outline-primary"> <i class="fas fa-save"></i> Save</button>
								</div>
							</form>
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
			Untuk Melihat Komponen Baris dan Kolom Silahkan <a href="<?= site_url('componen/index/' . $tabel_id) ?>"> Klik Disini </a>
		</p>
	</div>
</div>
<!-- /.content-wrapper -->

<?php
$this->load->view('layout/footer');
?>
