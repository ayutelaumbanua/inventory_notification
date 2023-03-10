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
			<div id="content" data-url="<?= base_url('penerimaan') ?>">
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
							<a href="<?= base_url('penerimaan/export_detail/' . $penerimaan->no_terima) ?>"
								class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>
							<a href="<?= base_url('penerimaan') ?>" class="btn btn-secondary btn-sm"><i
									class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
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
					<div class="card shadow">
						<div class="card-header"><strong>
								<?= $title ?> -
								<?= $penerimaan->no_terima ?>
							</strong></div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<table class="table table-borderless">
										<tr>
											<td>No Penerimaan</td>
											<td>:</td>
											<td>
												<?= $penerimaan->no_terima ?>
											</td>
										</tr>
										<tr>
											<td>Nama Petugas</td>
											<td>:</td>
											<td>
												<?= $penerimaan->nama_petugas ?>
											</td>
										</tr>
										<tr>
											<td>Nama Supplier</td>
											<td>:</td>
											<td>
												<?= $penerimaan->nama_supplier ?>
											</td>
										</tr>
										<tr>
											<td>Waktu Penerimaan</td>
											<td>:</td>
											<td>
												<?= $penerimaan->tgl_terima ?>
											</td>
										</tr>
									</table>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-12">
									<table class="table table-bordered">
										<thead>
											<tr>
												<td><strong>No</strong></td>
												<td><strong>Nama Barang</strong></td>
												<td><strong>Stok</strong></td>
												<td><strong>Satuan</strong></td>
												<td><strong>Tanggal Expired</strong></td>

											</tr>
										</thead>
										<tbody>
											<?php foreach ($all_detail_barang_masuk as $detail_barang_masuk): ?>
												<tr>
													<td>
														<?= $no++ ?>
													</td>
													<td>
														<?= $detail_barang_masuk->nama_barang ?>
													</td>
													<td>
														<?= $detail_barang_masuk->jumlah ?>
													</td>
													<td>
														<?= $detail_barang_masuk->satuan ?>
													</td>
													<td>
														<?= $detail_barang_masuk->tgl_expired ?>
													</td>
												</tr>
											<?php endforeach ?>
										</tbody>
									</table>
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
	<script src="<?= base_url('assets/js/demo/datatables-demo.js') ?>"></script>
	<script src="<?= base_url('assets') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('assets') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>

</html>