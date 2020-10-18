
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?= $detail['tabel_nm']; ?></h1>
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
				<div class="col-12">

					<div class="card">

<!-- 						<div class="card-header text-center">
							<h1 class="card-title"><?= $detail['tabel_nm']; ?></h1>

						</div> -->
						<div class="card-header">
							<div class="row">

								<div class=" col-md-2">Tahun </div>
								<select class="col-md-2 col-sm-4 form-control" name="" id="" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
									<?php
									for ($i = 2015; $i <= date('Y'); $i++) { ?>
										<option value="<?= base_url('tabel/detail/' . $tabel_id . "/" . $i.'?edit='.$edit) ?>" <?php
										if ($i==$tahun) {
											echo "selected";
										}
										?>><?=$i?>
									</option>
									<?php
								}
								?>
								</select>
							
								<div class="col-md-8">
									<?php
										if ($edit != 1) {
											?>
											<a href="<?= base_url('tabel/detail/' . $tabel_id) . '/' . $tahun.'?edit=1' ?>" class="btn btn-outline-primary float-right">
												<i class="fas fa-edit"></i>
											</a>
											<?php
											} else {
											?>
											<a href="<?= base_url('tabel/detail/' . $tabel_id) . '/' . $tahun ?>" class="btn btn-outline-primary float-right">
												batal</i>
											</a>
											<?php
										}
									?>
								</div>
							</div>
							<div class="row">
								<div class=" col-md-2">Kategori </div>
								<div class=" col-md-2"><?=$detail['kategori_nama'];?> </div>
							</div>
					</div>

					<!-- /.card-header -->
					<div class="card-body">
						<div class="row">
							<div class="col-md-1 col-lg-2">
								
							</div>
							<div class="col-md-10 col-lg-8">
								

								<?php
								if ($edit == 1) {
									?>
									<form action="<?= base_url('tabel/proses_detail/') ?>" method="post">
									<input type="hidden" name="tahun" value="<?= $tahun ?>">
									<input type="hidden" name="tabel_id" value="<?= $tabel_id ?>">
																	
									<?php
									}
								?>
								<table id="" class="table table-bordered table-striped">
									<thead>
										<tr class="bg-green">
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
														<td class="text-right">
															<?=$nmr?>.
														</td>
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

															<td class="
																<?php if ($klm->kolom_tipe == 'Angka' AND $edit == 0): 
																	echo 'text-right';
																endif ?>
															"
															>

															<?php
															if ($edit == 1) {
																?>
																<input type="<?php if ($b1->jumlah_anak == 0 OR $detail['jenis_id'] == 101) {
																		echo "text";
																	} else if ($b1->jumlah_anak > 0) {
																		echo "hidden";
																	} ?>" class="form-control" name="<?php echo 'isi_' . $klm->kolom_id . '_' . $b1->baris_id; ?>" value="<?= $value  ?>"
																	<?php if ($klm->kolom_tipe == 'Angka'): ?>
																		size = "20px"
																		<?php endif ?>
																		>
																<?php
																} else {
																	echo $value;
																}
															?>

																	


																</td>
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
															<td class="text-left"><li><?=$b2->baris_nm?></li></td>
															<?php
															foreach ($kolom as $klm) :
																$isi = $this->m_isi->isi_value($tabel_id, $klm->kolom_id, $b2->baris_id, $tahun);
																if (isset($isi)) {
																	$value = $isi->isi_value;
																} else {
																	$value = "";
																}
																?>
																<td class="
																<?php if ($klm->kolom_tipe == 'Angka'): 
																	echo 'text-right';
																endif ?>
															"
															>
																<?php
																if ($edit == 1) {
																	?>
																	<input type="<?php if ($b2->jumlah_anak == 0) {
																			echo "text";
																		} else if ($b2->jumlah_anak > 0) {
																			echo "hidden";
																		} ?>" class="" name="<?php echo 'isi_' . $klm->kolom_id . '_' . $b2->baris_id; ?>" value="<?= $value  ?>" 
																		<?php if ($klm->kolom_tipe == 'Angka'): ?>
																		size = "20px"
																		<?php endif ?>
																		>
																<?php
																} else {
																	echo $value;
																}
															?>
																



																</td>
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
								<?php
								if ($edit == 1) {
									?>
									<div class="d-flex justify-content-center">
										<button type="submit" value="" class="btn btn-outline-primary"> <i class="fas fa-save"></i> Save</button>
									</div>

									</form>									
									<?php
									}
								?>
							</div> 		<!-- end col tabel -->
						</div> 		<!-- end row tabel -->
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
