<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('partials/head.php') ?>
	<link rel="manifest" href="manifest.json" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#f45">
	<link rel="shortcut icon" href="assets/img/icon.png" type="image/png">
	<link rel="apple-touch-icon" href="icons-192.png" type="image/png">
</head>

<body id="page-top">
	<div id="wrapper">
		<?php $this->load->view('partials/sidebar.php') ?>
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content" data-url="<?= base_url('dashboard') ?>">
				<?php $this->load->view('partials/topbar.php') ?>
				<div class="container-fluid">
					<div class="clearfix">
						<div class="float-left">
							<h1 class="h3 m-0 text-gray-800">
								<?= $title ?>
							</h1>
						</div>
					</div>
					<hr>
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
					<div class="row">
						<div class="col-xl-3 col-md-6 mb-4">
							<div class="card shadow h-100 py-10">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="h4 mb-0 font-weight-bold text-black">
												<?= $jumlah_barang ?>
											</div>
											<div class="text-sm font-weight-bold text-primary">Total Barang</div>

										</div>
										<a href="<?= base_url('barang') ?>">
											<div class="col-auto">
												<i class="fas fa-box fa-3x text-primary"></i>
											</div>
									</div>
								</div>
								</a>
							</div>
						</div>
						<div class="col-xl-3 col-md-6 mb-4">
							<div class="card shadow h-100 py-10">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="h4 mb-0 font-weight-bold text-black">
												<?= $jumlah_stock_habis ?>
											</div>
											<div class="text-md font-weight-bold text-danger mb-1">Stock Habis</div>
										</div>
										<a href="<?= base_url('barang/stock_habis') ?>">
											<div class="col-auto">
												<i class="fas fa-minus-square fa-3x text-danger"></i>
											</div>
									</div>
								</div>
								</a>
							</div>
						</div>
						<div class="col-xl-3 col-md-6 mb-4">
							<div class="card shadow h-100 py-10">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="h4 mb-0 font-weight-bold text-black">
												<?= $jumlah_stock_expired ?>
											</div>
											<div class="text-md font-weight-bold text-warning mb-1">Stock Expired</div>
										</div>
										<a href="<?= base_url('barang/stock_expired') ?>">
											<div class="col-auto">
												<i class="fas fa-exclamation-triangle fa-3x text-warning"></i>
											</div>
									</div>
								</div>
								</a>
							</div>
						</div>
						<?php if ($this->session->userdata('access') == 'Manager'): ?>
							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card shadow h-100 py-10">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="h4 mb-0 font-weight-bold text-black">
													<?= $jumlah_user ?>
												</div>
												<div class="text-md font-weight-bold text-success mb-1">
													Users</div>
											</div>
											<a href="<?= base_url('user') ?>">
												<div class="col-auto">
													<i class="fas fa-user fa-3x text-success"></i>
												</div>
										</div>
									</div>
									</a>
								</div>
							</div>
						<?php endif ?>
						<?php if ($this->session->userdata('access') != 'Staff Gudang'): ?>
							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card shadow h-100 py-10">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="h4 mb-0 font-weight-bold text-black">
													<?= $jumlah_penerimaan ?>
												</div>
												<div class="text-md font-weight-bold text-info mb-1">
													Barang Masuk</div>
											</div>
											<a href="<?= base_url('penerimaan') ?>">
												<div class="col-auto">
													<i class="fas fa-sign-in-alt fa-rotate-90 fa-3x text-info"></i>
												</div>
										</div>
									</div>
									</a>
								</div>
							</div>
						<?php endif ?>
						<?php if ($this->session->userdata('access') != 'Purchasing'): ?>
							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card shadow h-100 py-10">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="h4 mb-0 mr-3 font-weight-bold text-black">
													<?= $jumlah_pengeluaran ?>
												</div>
												<div class="text-md font-weight-bold text-secondary">Barang Keluar
												</div>
											</div>
											<a href="<?= base_url('pengeluaran') ?>">
												<div class="col-auto">
													<i class="fas fa-sign-in-alt fa-rotate-270 fa-3x text-secondary"></i>
												</div>
										</div>
									</div>
									</a>
								</div>
							</div>
						<?php endif ?>
					</div>
				</div>
			</div>
			<div id="toast">
			</div>
			<?php $this->load->view('partials/footer.php') ?>
		</div>
	</div>
	<?php $this->load->view('partials/js.php') ?>
	<script>
		$.ajax({
			url: get_low_stock,
			type: 'GET',
			dataType: 'json',
			success: function (data) {
				let perm = Notification.permission;
				// default, granted, denied
				console.log(perm);
				if (!window.Notification) {
					alert('Your system does not support notification');
				}
				else {
					if (Notification.permission === 'granted') {
						// show notification
						data.forEach(element => {
							var nama_barang = element.nama_barang
							var greeting = new Notification("Notification", {
								body: '' + nama_barang + ' tersisa ' + element.stok + ' ' + element.satuan + ', lihat detail barang!',
								icon: ""
							})
							console.log(greeting);
							greeting.addEventListener("click", function () {
								window.open("http://localhost/inventori/barang")
							})
						});
					}
					else {
						Notification.requestPermission().then(function (p) {
							if (p === 'granted') {
								// show notification
								alert('hey permision taken')
								data.forEach(element => {
									var nama_barang = element.nama_barang
									var greeting = new Notification("Notification", {
										body: '' + nama_barang + ' tersisa ' + element.stok + ' ' + element.satuan + ', lihat detail barang!',
										icon: ""
									})
									console.log(greeting);
									greeting.addEventListener("click", function () {
										window.open("http://localhost/inventori/barang")
									})
								});
							}
							else {
								alert('User Blocked');

							}
						}
						)
					}
				}
			}
		})

	</script>
	<!-- Script browser notification -->
	<!-- script pwa -->
	<script src="service-worker.js"></script>
	<script>
		if (!navigator.serviceWorker.controller) {
			navigator.serviceWorker.register("service-worker.js").then(function (reg) {
				console.log("Service worker has been registered for scope: " + reg.scope);
			});
		}
	</script>
	<!-- <script>
						var BASE_URL = '<?= base_url() ?>';
			document.addEventListener('DOMContentLoaded', init, false);
				
			function init() {
				if ('serviceWorker' in navigator && navigator.onLine) {
					navigator.serviceWorker.register( BASE_URL + 'service-worker.js')
					.then((reg) => {
						console.log('Registrasi service worker Berhasil', reg);
					}, (err) => {
						console.error('Registrasi service worker Gagal', err);
					});
				}
			}
		</script> -->
	<!-- script pwa -->
</body>

</html>