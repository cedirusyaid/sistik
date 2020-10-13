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
							<h1 class="card-title"><?= $detail['tabel_nm']; ?></h1>
							<a href="<?= base_url('tabel/edit_detail/' . $tabel_id) . '/' . $tahun ?>" class="btn btn-outline-primary float-right">
								<i class="fas fa-edit"></i>
							</a>
						</div>
						<div class="card-header">
							<h3 class="card-title col-md-2">Tahun </h3>
							<select class="col-md-2 form-control" name="" id="" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
								<?php
								for ($i = 2015; $i <= date('Y'); $i++) { ?>
									<option value="<?= base_url('tabel/detail/' . $tabel_id . "/" . $i) ?>" <?php
									if ($i==$tahun) {
										echo "selected";
									}
									?>><?=$i?>
								</option>
								<?php
							}
							?>
						</select>
					</div>

					<!-- /.card-header -->
					<div class="card-body">
						<table id="" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th width="5%" class="text-center">No</th>
									<th class="text-center"><?=$tabel['jenis_nm']?></th>
									<?php
									$no = 0;
									foreach ($kolom as $data) :
										$no++;
										?>
										<th class="text-center"><?= $data->kolom_nm ?></th>
									<?php endforeach ?>
								</tr>
							</thead>
							<tbody>
								<?php



								if (count($baris_col)>0) {
									$nmr = 0;
									foreach ($baris_col as $b1) :
										if ($b1->baris_id>1 and $b1->baris_induk==0) {
										$nmr++;
												# code...
											$baris_detail = $this->m_baris->getById($b1->baris_id);

											?>
											<tr>
												<td class="text-right"><?=$nmr?>.</td>
												<td class="text-left"><?=$b1->baris_nm?></td>
												<?php
												foreach ($kolom as $klm) :
													$isi = $this->m_isi->isi_value($tabel_id, $klm->kolom_id, $b1->baris_id, $tahun);
													if (isset($isi)) {
														$value = $isi->isi_value;
													} else {
														$value = "";
													}
													?>
													<td><?= $value  ?></td>
												<?php endforeach
												?>
												
											</tr>
											<?php
										}
										foreach ($baris_col as $b2) :
											if ($b2->baris_induk == $b1->baris_id) {
														# code...
												$baris_detail = $this->m_baris->getById($b2->baris_id);

												?>
												<tr>
													<td></td>
													<td class="text-left"><li><?=$b2->baris_nm."   ".$b2->jumlah_anak?></li></td>
													<?php
													foreach ($kolom as $klm) :
														$isi = $this->m_isi->isi_value($tabel_id, $klm->kolom_id, $b2->baris_id, $tahun);
														if (isset($isi)) {
															$value = $isi->isi_value;
														} else {
															$value = "";
														}
														?>
														<td><?= $value  ?></td>
													<?php endforeach
													?>
												</tr>
												<?php
											}
										endforeach;

									endforeach;
								} 


								?>
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
