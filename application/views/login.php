<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Inventory Management- Login</title>
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
										<img class=" ml-2 mb-1" src="<?= base_url('assets') ?>/img/Logo_login.png"
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
</body>

</html>