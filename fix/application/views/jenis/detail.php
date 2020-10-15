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
					<h1>Detail Jenis Data</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
						<li class="breadcrumb-item active">Jenis</li>
					</ol>
				</div>
			</div>
		</div>
		<!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">



			<div class="card">
				<div class="card-header">
						<div class="row">
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-2">
								Jenis Data 
								
							</div>
							<div class="col-xs-9 col-sm-9 col-md-9 col-lg-6">
				                 <select class="form-control form-control-sm" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
				                    <option>Pilih Jenis</option>
				                    <?php
				                    // $data_unit = json_decode($data_unit_json);
				                    foreach ($jenisAll as $jAll) :
				                          ?>
				                          <option <?php echo $jenis_id == $jAll['jenis_id'] ? 'selected="selected"' : '' ?> 
				                              
				                              value="<?php 
				                                  echo base_url('/'. $this -> uri -> segment(1) . '/'. $this -> uri -> segment(2) . '/'. $jAll['jenis_id']);
				                              ?>"
				                              ><?php echo $jAll['jenis_nm'] ?></option>
				                          <?php
				                      endforeach;
				                      ?>
				                  </select>
								
							</div>
						</div>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<?php if($detail->jenis_locked == 0) : ?>
						<button type="button" class="btn btn-primary mb-4 float-right" data-toggle="modal" data-target="#addModal-baris"><i class="fas fa-plus"></i><!--  Tambah Baris --></button>
					<?php endif ?>
					<table id="" class="table table-bordered table-striped">
						<thead>
							<tr>
								<!-- <th class="text-center">No.</th> -->
								<th class="text-center">Nama Baris</th>
								<?php if($detail->jenis_locked == 0) : ?>
									<th class="text-center" width="20%">Aksi</th>
								<?php endif ?>
							</tr>
						</thead>
						<tbody>
							<?php
									// print_r($baris_col);
							$no = 0;
									// echo "jumlah induk :".count($baris_induk);
									// echo "induk  :".print_r($baris_induk);



							// print_r($baris_col);

							if (count($baris_col)>0) {
										# code...
								foreach ($baris_col as $b1) :
									if ($b1->baris_id>1 and $b1->baris_induk==0) {
												# code...
										$baris_detail = $this->m_baris->getById($b1->baris_id);

										?>
										<tr>
											<td class="text-left"><?=$b1->baris_nm?></td>
											<?php if($detail->jenis_locked == 0) : ?>
												<td class="text-center">

													<?php if($b1->jumlah_anak<1) { ?>
														<button data-toggle="modal" class="badge btn-info btn-sm btn-edit-baris" data-target="#edit<?= $b1->baris_id; ?>" ><i class="fas fa-edit"></i></button>
														<button data-toggle="modal" class="badge btn-danger btn-sm btn-delete-baris"  data-target="#hapus<?= $b1->baris_id; ?>"><i class="fas fa-trash"></i></button>
													<?php } ?>


												</td>
											<?php endif ?>

										</tr>
										<?php
									}
									foreach ($baris_col as $b2) :
										if ($b2->baris_induk == $b1->baris_id) {
														# code...
											$baris_detail = $this->m_baris->getById($b2->baris_id);

											?>
											<tr>
												<td class="text-left"><li><?=$b2->baris_nm?></li></td>
													<?php if($detail->jenis_locked == 0) : ?>
												<td class="text-center">

														<?php if($b2->jumlah_anak<1) : ?>
															<button data-toggle="modal" class="badge btn-info btn-sm btn-edit-baris" data-target="#edit<?= $b2->baris_id; ?>" data-name="<?= $b2->baris_nm; ?>"><i class="fas fa-edit"></i></button>
															<button data-toggle="modal" class="badge btn-danger btn-sm btn-delete-baris" data-target="#hapus<?= $b1->baris_id; ?>"><i class="fas fa-trash"></i></button>
														<?php endif ?>
												</td>
													<?php endif ?>
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
			<!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->			



	<?php
	$this->load->view('layout/footer');
	?>





	<!-- Baris Section Modal -->
	<!-- Modal Tambah Baris-->
	<form action="<?= site_url('compt/add_baris/' . $jenis_id) ?>" method="post">
		<div class="modal fade" id="addModal-baris" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Tambah Baris</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Baris Induk</label>
							<div class="dropdown bootstrap-select dropdown w-100">
								<select class="form-control" name="baris_induk" required="">
									<option value="0">Pilih Induk</option>
									<?php
									foreach ($baris_col as $data) :
										if ($data->baris_induk == 0 AND $data->jenis_id == $detail->jenis_id) { ?>
											<option value="<?= $data->baris_id ?>"><?= $data->baris_nm ?></option>
										<?php };
									endforeach ?>
									   <optgroup label="Kecamatan">
									<?php
									foreach ($baris_kec as $kec) :
										if ($kec->baris_induk == 0) { ?>
											<option value="<?= $kec->baris_id ?>"><?= $kec->baris_nm ?></option>
										<?php };
									endforeach ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label>Nama Baris</label>
							<input type="text" class="form-control" name="baris_nm" placeholder="Nama Baris">
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="jenis_id" value="<?= $jenis_id; ?>">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!-- End Modal Tambah Baris-->

	<!-- Modal Edit Baris-->
	<?php foreach ($baris_col as $dta1) { ?>

		<div class="modal fade" id="edit<?=$dta1->baris_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<form action="<?= site_url('jenis/edit_baris/' . $jenis_id) ?>" method="post">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Baris Induk</label>
								<div class="dropdown bootstrap-select dropdown w-100">
									<select class="form-control" name="baris_induk">
										<option value="0">Baris Induk</option>
										<?php
										foreach ($baris_col as $dta2) :
											if ($dta2->baris_induk == 0 and $dta1->baris_id !== $dta2->baris_id) { ?>
												<option value="<?= $dta2->baris_id ?>" <?php if ($dta2->baris_id == $dta1->baris_induk) {
													echo "selected";
												}
												?>>
												<?= $dta2->baris_nm ?>
											</option>
										<?php };
									endforeach ?>
									   <optgroup label="Kecamatan">
									<?php
									foreach ($baris_kec as $kec) :
										if ($kec->baris_induk == 0) { ?>
											<option value="<?= $kec->baris_id ?>"<?php if ($kec->baris_id == $dta1->baris_induk) {
													echo "selected";
												}
												?>><?= $kec->baris_nm ?></option>
										<?php };
									endforeach ?>

								</select>
							</div>
						</div>
						<div class="form-group">
							<label>Nama Baris</label>
							<input type="text" class="form-control" name="baris_nm" value="<?= $dta1->baris_nm ?>">
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="jenis_id" value="<?= $jenis_id; ?>">
						<input type="hidden" name="baris_id" value="<?= $dta1->baris_id; ?>">
						<!-- <input type="hidden" name="baris_id" class="form-control baris_id"> -->
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</div>
			</div>
		</form>
	</div>
<?php } ?>
<!-- End Modal Edit Product-->

<!-- Modal Delete Baris-->
<?php foreach ($baris_col as $data2) :?>

	<div class="modal fade" id="hapus<?= $data2->baris_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<form action="<?= site_url('jenis/delete_baris/' . $jenis_id) ?>" method="post">
			<input type="hidden" name="baris_id" value="<?=$data2->baris_id?>">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Hapus Baris</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<h4>Apakah Anda Ingin Menghapus Baris ini ?</h4>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
						<button type="submit" class="btn btn-primary">Yes</button>
					</div>
				</div>
			</div>
		</form>
	</div>
<?php endforeach ?>
<!-- End Modal Delete Baris -->
<!-- End Baris Section Modal -->


<script>
	$(document).ready(function() {

		// get Edit Baris
		$('.btn-edit-baris').on('click', function() {
			// get data from button edit
			const id = $(this).data('id');
			const name = $(this).data('name');
			// Set data to Form Edit
			$('.baris_id').val(id);
			$('.baris_nm').val(name);
			// Call Modal Edit
			$('#editModal-baris').modal('show');
		});

		// get Delete Baris
		$('.btn-delete-baris').on('click', function() {
			// get data from button edit
			const id = $(this).data('id');
			// Set data to Form Edit
			$('.baris_id').val(id);
			// Call Modal Edit
			$('#deleteModal-baris').modal('show');
		});

		
	});
</script>	


