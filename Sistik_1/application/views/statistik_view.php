<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<title>Statistik</title>
</head>
<body>
	<div class="container mt-4">
		<h2 class="text-center">Baris</h2>
		<table class="table table-hover table-stripped table-bordered">
			<thead>
				<tr>
					<th>Baris ID</th>
					<th>Baris Nama</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach ($statistik as $data) :			
				?>
				<tr>
					<td scope="row"><?= $data['baris_id']; ?></td>
					<td><?= $data['baris_nm']; ?></td>
					<td>
						<a href="#">Edit</a> | 
						<a href="#">Hapus</a>
					</td>
				</tr>
					<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>
</html>
