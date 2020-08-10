<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<title>Tambah Data</title>
</head>

<body>
	<form action="" method="post">
		<div class="container m-3">
			<input type="hidden" value="<?= $judul->judul_id ?>" name="id">
			<div class="form-group">
				<label for="">Judul</label>
				<input type="text" class="form-control" name="judul_nm" value="<?= $judul->judul_nm ?>">
			</div>
			<button type="submit" class="btn btn-primary" value="Update">Submit</button>
		</div>
	</form>
</body>

</html>
