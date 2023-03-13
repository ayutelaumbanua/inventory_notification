<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('partials/head.php') ?>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link href="<?= base_url('assets') ?>/css/card_dashboard.css" rel="stylesheet">

</head>

<body id="page-top">
	<div id="wrapper">
		<!-- load sidebar -->
		<?php $this->load->view('partials/sidebar.php') ?>
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content" data-url="<?= base_url('dashboard') ?>">
				<!-- load Topbar -->
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

						<div class="col-md-12 ">
							<div class="row ">
								<div class="col-xl-3 col-lg-6">
									<div class="card l-bg-blue-dark">

										<div class="card-statistic-3 p-4">
											<div class="card-icon card-icon-large"><i class="fas fa-shopping-cart"></i>
											</div>
											<div class="mb-4">
												<h5 class="card-title mb-0">Data Barang</h5>
											</div>
											<div class="row align-items-center mb-2 d-flex">
												<div class="col-8">
													<h2 class="d-flex align-items-center mb-0">
														<?= $jumlah_barang ?>
													</h2>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-3 col-lg-6">
									<div class="card l-bg-cherry">
										<div class="card-statistic-3 p-4">
											<div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
											<div class="mb-4">
												<h5 class="card-title mb-0">Stok Habis</h5>
											</div>
											<div class="row align-items-center mb-2 d-flex">
												<div class="col-8">
													<h2 class="d-flex align-items-center mb-0">
														<?= $jumlah_stock_habis ?>
													</h2>
												</div>

											</div>

										</div>
									</div>
								</div>
								<div class="col-xl-3 col-lg-6">
									<div class="card l-bg-green-dark">
										<div class="card-statistic-3 p-4">
											<div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i>
											</div>
											<div class="mb-4">
												<h5 class="card-title mb-0">Transaksi Penerimaan</h5>
											</div>
											<div class="row align-items-center mb-2 d-flex">
												<div class="col-8">
													<h2 class="d-flex align-items-center mb-0">
														<?= $jumlah_penerimaan ?>
													</h2>
												</div>
											
											</div>
											
										</div>
										
									</div>
									
								</div>
								<div class="col-xl-3 col-lg-6">
									<div class="card l-bg-orange-dark">
										<div class="card-statistic-3 p-4">
											<div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i>
											</div>
											<div class="mb-4">
												<h5 class="card-title mb-0">Transaksi Pengeluaran</h5>
											</div>
											<div class="row align-items-center mb-2 d-flex">
												<div class="col-8">
													<h2 class="d-flex align-items-center mb-0">
														<?= $jumlah_pengeluaran ?>
													</h2>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="toast">
	</div>
	<!-- load footer -->
	<?php $this->load->view('partials/footer.php') ?>
	</div>
	</div>
	<?php $this->load->view('partials/js.php') ?>
	<script src="<?= base_url('assets/js/demo/datatables-demo.js') ?>"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous"></script>
	<script src="https://timeago.yarp.com/jquery.timeago.js" type="text/javascript"></script>
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
		})
	</script>
</body>

</html>