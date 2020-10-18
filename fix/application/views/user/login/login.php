<?php defined('BASEPATH') OR exit('No direct script access allowed'); 


// $user=json_decode(file_get_contents(SITE_API.'pegawai_data/'.'197708262010011003'));
// print_r($user);


?>
<!--<div class="container">-->
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-6">
			<div class="page-header text-center">
				<h1>Login</h1>
			</div>
			<?= form_open() ?>
				<div class="form-group">
					<label for="nip">NIP</label><input type="text" class="form-control" id="nip" name="nip" placeholder="NIP Anda">
				</div>
				<div class="form-group">
					<label for="password">Password</label><input type="password" class="form-control" id="password" name="password" placeholder="Password Anda">
				</div>
				<?php if (validation_errors()) : ?>
					<div class="col-md-12">
						<div class="alert alert-danger" role="alert">
							<?= validation_errors() ?>
						</div>
					</div>
				<?php endif; ?>
				<?php if (isset($error)) : ?>
					<div class="col-md-12">
						<div class="alert alert-danger" role="alert">
							<?= $error ?>
						</div>
					</div>
				<?php endif; ?>
				<div class="form-group">
					<input type="submit" class="btn btn-success text-center" value="Login">
				</div>
			</form>
		</div>
		</div>
		<?php
		// echo  SITE_API.'user_auth/?username='.'&password=';

		?>
	<!--</div>--><!-- .row -->
<!--</div>--><!-- .container -->