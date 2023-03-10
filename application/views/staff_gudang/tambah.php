<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('partials/head.php') ?>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body id="page-top">
	<div id="wrapper">
		<!-- load sidebar -->
		<?php $this->load->view('partials/sidebar.php') ?>

		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content" data-url="<?= base_url('staff_gudang') ?>">
				<!-- load Topbar -->
				<?php $this->load->view('partials/topbar.php') ?>

				<div class="container-fluid">
					<div class="clearfix">
						<div class="float-left">
							<h1 class="h3 m-0 text-gray-800">
								<?= $title ?>
							</h1>
						</div>
						<div class="float-right">
							<a href="<?= base_url('staff_gudang') ?>" class="btn btn-secondary btn-sm"><i
									class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12">
							<div class="card shadow">
								<div class="card-header"><strong>Isi Form Dibawah Ini</strong></div>
								<div class="card-body">
									<form action="<?= base_url('staff_gudang/proses_tambah') ?>" id="form-tambah"
										method="POST">
										<a style="color:#42444e">
											<i class="fas fa-fw fa-user"></i>
											<span><strong>Data Pribadi</strong></span>
										</a>
										<hr>
										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="kode">Kode Staff Gudang</label>
												<input type="text" name="kode" placeholder="Masukkan Kode purchasing"
													autocomplete="off" class="form-control" required
													value="STG<?= mt_rand(1, 1000) ?>" maxlength="8" readonly>
											</div>
											<div class="form-group col-md-6">
												<label for="nama">Nama Staff Gudang</label>
												<input type="text" name="nama" placeholder="Masukkan Nama purchasing"
													autocomplete="off" class="form-control" required>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="email">Email</label>
												<input type="email" name="email" placeholder="Masukkan Email"
													autocomplete="off" class="form-control" required>
											</div>
											<div class="form-group col-md-6">
												<label for="telepon">Telepon</label>
												<input type="number" name="telepon" placeholder="Masukkan No Telepon"
													autocomplete="off" class="form-control" required>
											</div>
										</div>
										<div class="form-group">
											<label for="alamat">Alamat</label>
											<textarea name="alamat" id="alamat" style="resize: none;"
												class="form-control" placeholder="Masukkan Alamat"></textarea>
										</div>
										<a style="color:#42444e">
											<i class="fas fa-fw fa-lock"></i>
											<span ><strong>Make Password</strong></span>
										</a>
										<hr>
										<div class="form-row">
											<div class="form-group col-md-6">
												<label for="username">Username</label>
												<input type="text" name="username" placeholder="Masukkan Username"
													autocomplete="off" class="form-control" required readonly>
											</div>
											<div class="form-group col-md-6">
												<label for="password">Password</label>
												<input type="text" name="password" placeholder="Masukkan Password"
													autocomplete="off" class="form-control" required>
											</div>
										</div>
										<hr>
										<div class="form-group">
											<button type="submit" class="btn btn-primary"><i
													class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
											<button type="reset" class="btn btn-danger"><i
													class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- load footer -->
			<?php $this->load->view('partials/footer.php') ?>
		</div>
	</div>
	<?php $this->load->view('partials/js.php') ?>
	<script>
		$(document).ready(function () {
			let username = $('input[name="kode"]').val().split('STG');
			username = 'Staff Gudang-' + username[1]
			$('input[name="username"]').val(username)
		})
	</script>
</body>

</html>