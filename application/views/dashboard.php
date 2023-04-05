<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('partials/head.php') ?>
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
						<div class="col-xl-3 col-md-6 mb-4">
							<div class="card shadow h-100 py-10">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="h4 mb-0 mr-3 font-weight-bold text-black">
												<?= $jumlah_pengeluaran ?>
											</div>
											<div class="text-md font-weight-bold text-warning">Barang Keluar
											</div>
										</div>
										<a href="<?= base_url('penerimaan') ?>">
											<div class="col-auto">
												<i class="fas fa-sign-in-alt fa-rotate-270 fa-3x text-warning"></i>
											</div>
									</div>
								</div>
								</a>
							</div>
						</div>
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
		const get_low_stock = 'barang/get_low_stock';
		$.ajax({
			url: get_low_stock,
			type: 'GET',
			dataType: 'json',
			success: function (data) {
				data.forEach(element => {
					var nama_barang = element.nama_barang
					$('#toast').append(
						'<div class="toast" role="alert" aria-live="assertive" data-autohide="false">' +
						'<div class="toast-header">' +
						'<strong class="mr-auto">Stock berkurang!</strong>' +
						'<small>' + $.timeago(new Date()) + '</small>' +
						'<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">' +
						'<span aria-hidden="true">&times;</span>' +
						'</button>' +
						'</div>' +
						'<div class="toast-body">' +
						'' + nama_barang + ' tersisa ' + element.stok + ' ' + element.satuan + ', lakukan tindakan!' +
						'</div>' +
						'</div>');
				});
				$('.toast').toast('show')
			}
		})	</script>
</body>

</html>