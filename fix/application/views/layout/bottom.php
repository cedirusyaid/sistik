 <footer class="main-footer">
 	<strong>Copyright &copy; 2020 <a href="http://sinjaikab.go.id" target="_blank">Diskominfo Kabupaten Sinjai</a>.</strong>
 	All rights reserved.
 	<div class="float-right d-none d-sm-inline-block">
 		<b>Version</b> 1.0.0
 	</div>
 </footer>




 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
<?php		$this->load->view('layout/sidebar'); ?>
 </aside>
 <!-- /.control-sidebar -->
 </div>
 <!-- ./wrapper -->

 <!-- jQuery -->
 <script src="<?= base_url('asset/plugins/jquery/jquery.min.js'); ?>"></script>
 <!-- jQuery UI 1.11.4 -->
 <script src="<?= base_url('asset/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
 <!-- DataTables -->
 <script src="<?= base_url('asset/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
 <script src="<?= base_url('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
 <script src="<?= base_url('asset/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
 <script src="<?= base_url('asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
 	$.widget.bridge('uibutton', $.ui.button)
 </script>
 <!-- Bootstrap 4 -->
 <script src="<?= base_url('asset/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
 <!-- ChartJS -->
 <script src="<?= base_url('asset/plugins/chart.js/Chart.min.js'); ?>"></script>
 <!-- Sparkline -->
 <script src="<?= base_url('asset/plugins/sparklines/sparkline.js'); ?>"></script>
 <!-- JQVMap -->
 <script src="<?= base_url('asset/plugins/jqvmap/jquery.vmap.min.js'); ?>"></script>
 <script src="<?= base_url('asset/plugins/jqvmap/maps/jquery.vmap.usa.js'); ?>"></script>
 <!-- jQuery Knob Chart -->
 <script src="<?= base_url('asset/plugins/jquery-knob/jquery.knob.min.js'); ?>"></script>
 <!-- daterangepicker -->
 <script src="<?= base_url('asset/plugins/moment/moment.min.js'); ?>"></script>
 <script src="<?= base_url('asset/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
 <!-- Tempusdominus Bootstrap 4 -->
 <script src="<?= base_url('asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>"></script>
 <!-- Summernote -->
 <script src="<?= base_url('asset/plugins/summernote/summernote-bs4.min.js'); ?>"></script>
 <!-- overlayScrollbars -->
 <script src="<?= base_url('asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>
 <!-- AdminLTE App -->
 <script src="<?= base_url('asset/dist/js/adminlte.js'); ?>"></script>
 <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 <script src="<?= base_url('asset/dist/js/pages/dashboard.js'); ?>"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="<?= base_url('asset/dist/js/demo.js'); ?>"></script>
 <script>
 	$(document).ready(function() {
 		$("#table").DataTable({
 			autoWidth: false,
 			responsive: true,
 		});
 		$("#table1").DataTable({
 			autoWidth: false,
 			responsive: true,
 		});

 	});
 </script>

<script>
	$(document).ready(function() {

	
		// get Edit Kolom
		$('.btn-edit-kolom').on('click', function() {
			// get data from button edit
			const id = $(this).data('id');
			const name = $(this).data('name');
			const tipe = $(this).data('tipe');
			// Set data to Form Edit
			$('.kolom_id').val(id);
			$('.kolom_nm').val(name);
			$('.kolom_tipe').val(tipe);
			// Call Modal Edit
			$('#editModal-kolom').modal('show');
		});

		// get Delete kolom
		$('.btn-delete-kolom').on('click', function() {
			// get data from button edit
			const id = $(this).data('id');
			// Set data to Form Edit
			$('.kolom_id').val(id);
			// Call Modal Edit
			$('#deleteModal-kolom').modal('show');
		});
	});
</script>

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


 </body>

 </html>
