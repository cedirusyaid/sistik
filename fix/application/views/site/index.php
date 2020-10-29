<?php
$this->load->model('m_tabel');
$this->load->model('m_baris');
$this->load->model('m_jenis');
$this->load->model('m_kolom');
$this->load->model('m_isi');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Data Statistik Pemerintah Kabupaten Sinjai</h1>
				</div>
<!-- 				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Tabel</li>
					</ol>
				</div> -->
			</div>
		</div>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- <div class="col-1"></div> -->
				<div class="col-12">

					<div class="card">
<!-- 						<div class="card-header">
							<h3 class="card-title">DataTable with default features</h3>
						</div> -->
						<!-- /.card-header -->
						<div class="card-body bg-dark">

							<div id="caroTbl" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
									<?php 
									$nmr=0;
									foreach ($tabel as $tbl) : 
										// print_r($tbl);				                  			

										?>
										<li data-target="#caroTbl" data-slide-to="<?=$nmr?>" <?php if ($nmr==0) {echo "class='active'";}?>></li>
										<?php 
										$nmr++;
									endforeach; 
									?>
								</ol>

								<div class="carousel-inner">
									<?php 
									$nmr=0;
									foreach ($tabel as $tbl) : 


										$detail = $this->m_tabel->getById($tbl['tabel_id']);
										$baris_col = $this->m_baris->getBarisAll($tbl['jenis_id']);
										$kolom = $this->m_tabel->tabel_kolom($tbl['tabel_id']);
										$tabel_id = $tbl['tabel_id'];
										?>
										<div class="carousel-item<?php if ($nmr==0) {echo " active";}?>">
											<div class="row">
												<div class="col-12">
													<h3 class="text-center"><?=$tbl['tabel_nm'];?></h3>
												</div>

											</div>
											<div class="row">
												<div class="col-md-1 col-lg-2"></div>
												<div class="col-sm-12 col-md-10 col-lg-8">
					



													<table id="" class="table table-bordered table-striped">
														<thead>
															<tr class="bg-primary">
																<th width="5%" class="text-center">No</th>
																<th class="text-center"><?=$detail['jenis_nm']?></th>
																<?php
																$no = 0;
																foreach ($kolom as $data) :
																	$no++;
																	?>
																	<th class="text-center text-wrap"><?= $data->kolom_nm ?></th>
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
																				<?php if ($klm->kolom_tipe == 'Angka'): 
																				echo 'text-right';
																			endif ?>
																			"
																			>

																			<?php

																			echo $value;
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
																		echo $value;
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


								</div>

							</div>





						</div>

						<?php 
						$nmr++;
					endforeach; 
					?>


				</div>



				<a class="carousel-control-prev" href="#caroTbl" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#caroTbl" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>






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
