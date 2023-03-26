<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#f45">
	<link rel="shortcut icon" href="assets/img/Logo App.png" type="image/png">
	<link rel="apple-touch-icon" href="assets/img/icons-192.png" type="image/png">
	<!-- PWA -->
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<title>Inventory Management- Login</title>
	<!-- PWA -->
	<!-- <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png"> -->
	<link rel="icon" type="image/png" sizes="192x192" href="/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<link href="<?= base_url('assets') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">
	<link href="<?= base_url('assets') ?>/css/bootstrap.css" rel="stylesheet">

</head>

<body class="bg-login-image">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-100 col-md-5">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<div class="row">
							<div class="col-lg-12">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="p-4">
									<div class="text-center">
										<?php if ($this->session->flashdata('success')): ?>
											<div class="alert alert-success alert-dismissible fade show" role="alert">
												<?= $this->session->flashdata('success') ?>
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
										<?php elseif ($this->session->flashdata('error')): ?>
											<div class="alert alert-danger alert-dismissible fade show" role="alert">
												<?= $this->session->flashdata('error') ?>
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
										<?php endif ?>
										<img class=" ml-2 mb-1" src="<?= base_url('assets') ?>/img/Logo_white.png"
											height="100px">
									</div>
									<br>
									<form class="user" method="POST" action="<?= base_url('login/proses_login') ?>">
										<div class="form-group">
											<input type="text" class="form-control" id="username"
												placeholder="Masukkan Username" autocomplete="off" required
												name="username">
										</div>
										<div class="form-group">
											<input type="password" class="form-control" id="password"
												placeholder="Masukkan Password" required name="password">
										</div>
										<div class="form-group">
											<select name="role" id="role" class="form-control" required>
												<option value="">Login As</option>
												<option value="manager">Manager</option>
												<option value="purchasing">Purchasing</option>
												<option value="staff_gudang">Staff Gudang</option>
											</select>
										</div>
										<button type="submit" class="btn btn-primary btn-block" name="login">
											Login
										</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="<?= base_url('assets') ?>/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('assets') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('assets') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="<?= base_url('assets') ?>/js/bootstrap.min.js"></script>
	<script>
		var BASE_URL = '<?= base_url() ?>';
		document.addEventListener('DOMContentLoaded', init, false);

		function init() {
			if ('serviceWorker' in navigator && navigator.onLine) {
				navigator.serviceWorker.register(BASE_URL + 'service-worker.js')
					.then((reg) => {
						console.log('Registrasi service worker Berhasil', reg);
					}, (err) => {
						console.error('Registrasi service worker Gagal', err);
					});
			}
		}
	</script>
</body>

</html>