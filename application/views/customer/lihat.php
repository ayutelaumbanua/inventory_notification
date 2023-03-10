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
			<div id="content" data-url="<?= base_url('customer') ?>">
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
							<?php if ($this->session->login['role'] == 'manager' or $this->session->login['role'] == 'staff_gudang'): ?>
								<a href="<?= base_url('customer/export') ?>" class="btn btn-danger btn-sm"><i
										class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>
								<a href="<?= base_url('customer/tambah') ?>" class="btn btn-primary btn-sm"><i
										class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>
							<?php endif ?>
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
							<div class="table-responsive">
								<table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr style="background:#42444e;color:#fff;">
											<td>No</td>
											<td>Kode</td>
											<td>Nama</td>
											<td>Telepon</td>
											<td>Email</td>
											<td>Alamat</td>
											<td>Tanggal Daftar</td>
											<?php if ($this->session->login['role'] == 'manager' or $this->session->login['role'] == 'staff_gudang'): ?>
												<td>Aksi</td>
											<?php endif ?>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($all_customer as $customer): ?>
											<tr>
												<td>
													<?= $no++ ?>
												</td>
												<td>
													<?=$customer->kode ?>
												</td>
												<td>
													<?= $customer->nama ?>
												</td>
												<td>
													<?= $customer->telepon ?>
												</td>
												<td>
													<?= $customer->email ?>
												</td>
												<td>
													<?= $customer->alamat ?>
												</td>
												<td>
													<?= $customer->tgl_daftar ?>
												</td>
												<?php if ($this->session->login['role'] == 'manager' or $this->session->login['role'] == 'staff_gudang'): ?>
													<td>
														<a class="dropdown-toggle" href="#" id="userDropdown" role="button"
															data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<span class="sm-2 d-none d-sm-inline text-blue-600 ">
																<i class="fa fa-pen"> Edit</i>
															</span>
														</a>
														<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
															aria-labelledby="userDropdown">
															<a class="dropdown-item"
																href="<?= base_url('customer/edit/' . $customer->kode) ?>">
																<i class="fa fa-pen fa-sm fa-fw sm-2 text-gray-400"></i>
																Edit Customer
															</a>
															<a class="dropdown-item"
																onclick="return confirm('apakah anda yakin?')"
																href="<?= base_url('customer/hapus/' . $customer->kode) ?>"
																class="btn btn-danger btn-sm">
																<i class="fa fa-trash fa-sm fa-fw mr-2 text-gray-400"></i>
																Hapus Customer
															</a>
														</div>
													</td>
												<?php endif ?>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
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