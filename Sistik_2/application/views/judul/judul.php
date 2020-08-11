<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<title>Judul</title>
</head>

<body>
	<div class="container text-center" style="margin-top: 50px;">
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
						<td scope="row"><?= $no. "."; ?></td>
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

	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		});
	</script>
</body>

</html>
