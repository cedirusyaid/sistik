

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Tambah Jenis Data</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
						<li class="breadcrumb-item active">Tambah Jenis Data</li>
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

					<!-- Horizontal Form -->
					<div class="card card-info">
						<div class="card-header">
							<h3 class="card-title">Form</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form class="form-horizontal" action="<?= site_url('jenis/add') ?>" method="POST"> <div class="card-body">
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Jenis Data</label> <div class="col-sm-4">
										<input type="text" class="form-control" placeholder="Jenis Data" name="jenis_nm"> </div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Keterangan</label> <div class="col-sm-10">
										<input type="text" class="form-control" placeholder="Keterangan" name="jenis_ket"> </div>
								</div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<input type="hidden" class="form-control" value="0" name="jenis_id">
								<button type="submit" class="btn btn-info text-white">Kirim</button>
							</div>
							<!-- /.card-footer -->
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- 
<script>
	$(document).ready(function() {
		$('#example').DataTable({
			responsive: true
		});

		$(document).on('click', '#unit', function(e) {
			document.getElementById("unit_id").value = $(this).attr('data-kode');
			document.getElementById("unit_nm").value = $(this).attr('data-nama');
			document.getElementById("unit_nm").value = $(this).attr('data-nama');
			$('#modal').modal('hide');
		});
	});
</script>
 -->