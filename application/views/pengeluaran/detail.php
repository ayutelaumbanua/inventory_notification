<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('partials/head.php') ?>
</head>

<body id="page-top">
	<div id="wrapper">
		<?php $this->load->view('partials/sidebar.php') ?>
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content" data-url="<?= base_url('pengeluaran') ?>">
				<?php $this->load->view('partials/topbar.php') ?>
				<div class="container-fluid">
					<div class="clearfix">
						<div class="float-left">
							<h1 class="h4 m-0 text-gray-800">
								<?= $title ?>
							</h1>
						</div>
						<div class="float-right">
							<a href="<?= base_url('pengeluaran/export_detail/' . $pengeluaran->no_keluar) ?>"
								class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>
							<a href="<?= base_url('pengeluaran') ?>" class="btn btn-secondary btn-sm"><i
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
								<?= $pengeluaran->no_keluar ?>
							</strong></div>
						<div class="card-body">
							<div class="row" >
								<div class="col-md-6">
									<table class="table table-borderless">
										<tr>
											<td>No Keluar</td>
											<td>:
												<?= $pengeluaran->no_keluar ?>
											</td>
										</tr>
										<tr>
											<td>Nama Petugas</td>
											<td>:
												<?= $pengeluaran->nama_petugas ?>
											</td>
										</tr>
										<tr>
											<td>Nama Customer</td>
											<td>:
												<?= $pengeluaran->nama_customer ?>
											</td>
										</tr>
										<tr>
											<td>Waktu Keluar</td>
											<td>:
											<?= date('d-m-Y H:i:s', strtotime($pengeluaran->tgl_keluar)) ?>
											</td>
										</tr>
									</table>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-12">
									<table class="table table-bordered">
										<thead style="background-color: rgba(0,0,0,.03);">
											<tr>
												<td><strong>No</strong></td>
												<td><strong>Nama Barang</strong></td>
												<td><strong>Jumlah</strong></td>
												<td><strong>Satuan</strong></td>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($all_detail_pengeluaran as $detail_pengeluaran): ?>
												<tr>
													<td width="10%">
														<?= $no++ ?>
													</td>
													<td width="40%">
														<?= $detail_pengeluaran->nama_barang ?>
													</td>
													<td>
														<?= $detail_pengeluaran->jumlah ?>
													</td>
													<td>
														<?= $detail_pengeluaran->satuan ?>
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
			<?php $this->load->view('partials/footer.php') ?>
		</div>
	</div>
	<?php $this->load->view('partials/js.php') ?>
</body>

</html>