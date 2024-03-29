<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('partials/head.php') ?>
</head>

<body id="page-top">
	<div id="wrapper">
		<?php $this->load->view('partials/sidebar.php') ?>
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content" data-url="<?= base_url('barang') ?>">
				<?php $this->load->view('partials/topbar.php') ?>
				<div class="container-fluid">
					<div class="clearfix">
						<div class="float-left">
							<h1 class="h4 m-0 text-gray-800">
								<?= $title ?>
							</h1>
						</div>
						<div class="float-right">
							<a href="<?= base_url('barang/export_barang_habis') ?>" class="btn btn-success btn-sm"><i
									class="fa fa-file-excel"></i>&nbsp;&nbsp;Export</a>
							<!-- <a href="<?= base_url('barang/export_barang_habis_pdf') ?>" class="btn btn-danger btn-sm"><i
									class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a> -->
							<a href="<?= base_url('barang') ?>" class="btn btn-secondary btn-sm"><i
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
						<div class="card-body">
							<form action="<?= base_url('barang/export_barang_habis') ?>" method="POST">
								<div class="row mb-3">
									<div class="col-md-3">
										<label for="fromDate">From Date:</label>
										<input type="date" class="form-control" id="fromDate" name="fromDate">
									</div>
									<div class="col-md-3">
										<label for="toDate">To Date:</label>
										<input type="date" class="form-control" id="toDate" name="toDate">
									</div>
									<div class="col-md-3">
										<button type="submit" class="btn btn-primary mt-4" id="filterBtn">Filter</button>
									</div>
								</div>
							</form>
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr style="background:#42444e;color:#fff;">
											<td width="5%">No</td>
											<td width="15%">Kode Barang</td>
											<td>Kategori</td>
											<td >Nama Barang</td>
											<td>Stok</td>
											<td witdh="5%">Satuan</td>
											<td witdh="5%">Tanggal </td>								
										</tr>
									</thead>
									<tbody>
										<?php foreach ($all_stock_habis as $barang): ?>
											<tr>
												<td>
													<?= $no++ ?>
												</td>
												<td>
													<?= $barang->kode_barang ?>
												</td>
												<td>
													<?= $barang->kategori_barang ?>
												</td>
												<td>
													<?= $barang->nama_barang ?>
												</td>
												<td>
													<?= $barang->stok ?>
												</td>
												<td>
													<?= $barang->satuan ?>
												</td>
												<td>
													<?= date('m-d-Y', strtotime($barang->tgl_edit)) ?>
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
			<?php $this->load->view('partials/footer.php') ?>
		</div>
	</div>
	<?php $this->load->view('partials/js.php') ?>

</body>

</html>