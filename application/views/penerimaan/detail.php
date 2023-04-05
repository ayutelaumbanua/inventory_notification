<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('partials/head.php') ?>
</head>

<body id="page-top">
	<div id="wrapper">
		<?php $this->load->view('partials/sidebar.php') ?>
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content" data-url="<?= base_url('penerimaan') ?>">
				<?php $this->load->view('partials/topbar.php') ?>
				<div class="container-fluid">
					<div class="clearfix">
						<div class="float-left">
							<h1 class="h4 m-0 text-gray-800">
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
											<?= date('d-m-Y H:i:s', strtotime($penerimaan->tgl_terima))?>
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
												<td><strong>Tanggal Expired</strong></td>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($all_detail_penerimaan as $detail_penerimaan): ?>
												<tr>
													<td>
														<?= $no++ ?>
													</td>
													<td>
														<?= $detail_penerimaan->nama_barang ?>
													</td>
													<td>
														<?= $detail_penerimaan->jumlah ?>
													</td>
													<td>
														<?= $detail_penerimaan->satuan ?>
													</td>
													<td>
														<?= date('d-m-Y H:i:s', strtotime($detail_penerimaan->tgl_expired)) ?>
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