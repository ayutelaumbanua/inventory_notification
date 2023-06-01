<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('partials/head.php') ?>
</head>

<body id="page-top">
	<div id="wrapper">
		<?php $this->load->view('partials/sidebar.php') ?>
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content" data-url="<?= base_url('customer') ?>">
				<?php $this->load->view('partials/topbar.php') ?>
				<div class="container-fluid">
					<div class="clearfix">
						<div class="float-left">
							<h1 class="h4 m-0 text-gray-800">
								<?= $title ?>
							</h1>
						</div>
						<div class="float-right">
							<?php if ($this->session->userdata('access') != 'Purchasing'): ?>
								<a href="<?= base_url('customer/export') ?>" class="btn btn-danger btn-sm"><i
										class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>
								<a href="#" class="btn btn-primary btn-sm" type="button" data-toggle="modal"
									data-target="#tambahCustomer"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>
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
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr style="background:#42444e;color:#fff;">
											<td>No</td>
											<td>Nama</td>
											<td>Telepon</td>
											<td>Email</td>
											<td>Alamat</td>
											<td>Tanggal Daftar</td>
											<?php if ($this->session->userdata('access') != 'Purchasing'): ?>
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
													<?= date('d-m-Y H:i:s', strtotime($customer->tgl_daftar)) ?>
												</td>
												<?php if ($this->session->userdata('access') != 'Purchasing'): ?>
													<td>
														<a class="dropdown-toggle" href="#" id="userDropdown" role="button"
															data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
															style="color:#42444e">
															<span class="sm-2 d-none d-sm-inline" style="color:#42444e">
																<i class="fa fa-pen"> Edit</i>
															</span>
														</a>
														<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
															aria-labelledby="userDropdown">
															<a class="dropdown-item" type="button" data-toggle="modal"
																data-target="#editCustomer<?= $customer->id ?>">
																<i class="fa fa-pen fa-sm fa-fw sm-2 text-primary"></i> Edit
																Customer</a>
															<a class="dropdown-item alert_notif" style="color:black"
																type="button"
																href="<?= base_url('customer/hapus/' . $customer->id) ?>"
																id="alert_notif">
																<i class="fa fa-trash fa-sm fa-fw sm-2 text-danger"></i> Hapus
																Customer</a>
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
				<!-- Modals Tambah Customer -->
				<div id="tambahCustomer" class="modal fade" role="dialog" data-url="<?= base_url('customer') ?>">
					<div class="modal-dialog">
						<div class="modal-content" style=" border-radius:0px;">
							<div class="modal-header" style="background:white;color:#fff;">
								<h5 class="h5 mb-0 font-weight-bold text-gray-800"><i class="fa fa-plus"></i> Tambah
									Customer
								</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
								<form action="<?= base_url('customer/proses_tambah') ?>" id="form-edit" method="POST">
									<div class="table-responsive">
										<table class="table" width="100%" cellspacing="0">
											<thead>

												<tr>
													<td>Nama Customer</td>
													<td><input type="text" name="nama" placeholder="Masukkan Nama"
															autocomplete="off" class="form-control" required></td>
												</tr>
												<tr>
													<td>Telepon</td>
													<td><input type="number" name="telepon"
															placeholder="Masukkan Nomor Telepon" autocomplete="off"
															class="form-control" required></td>
												</tr>
												<tr>
													<td>Email</td>
													<td><input type="email" name="email" placeholder="Masukkan Email"
															autocomplete="off" class="form-control" required></td>
												</tr>
												<tr>
													<td>Alamat</td>
													<td><textarea name="alamat" id="alamat" style="resize: none;"
															class="form-control"
															placeholder="Masukkan Alamat"></textarea></td>
												</tr>
												<tr>
													<td><input type="hidden" name="tgl_daftar"
															value="<?= date('Y-m-d H:i:s'); ?>" readonly
															class="form-control"></td>
												</tr>
											</thead>
										</table>
									</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary"><i
										class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
								<button type="reset" class="btn btn-danger"><i
										class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
							</div>
							</form>
						</div>
					</div>
				</div>

				<!-- Modal Edit Customer-->
				<?php $no = 0;
				foreach ($all_customer as $customer):
					$no++; ?>
					<div id="editCustomer<?= $customer->id ?>" class="modal fade" role="dialog"
						data-url="<?= base_url('customer') ?>">
						<div class="modal-dialog">
							<div class="modal-content" style=" border-radius:0px;">
								<div class="modal-header" style="background:white;color:#fff;">
									<h5 class="h5 mb-0 font-weight-bold text-gray-800"><i class="fa fa-pen"></i> Edit
										Customer
									</h5>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
								<div class="modal-body">
									<form action="<?= base_url('customer/proses_edit/' . $customer->id) ?>" id="form-tambah"
										method="POST">
										<div class="table-responsive">
											<table class="table" width="100%" cellspacing="0">
												<thead>
													<tr>
														<td>Nama Customer</td>
														<td><input type="text" name="nama" placeholder="Masukkan Nama"
																autocomplete="off" class="form-control"
																value="<?= $customer->nama ?>" required></td>
													</tr>
													<tr>
														<td>Telepon</td>
														<td><input type="number" name="telepon"
																placeholder="Masukkan Nomor Telepon" autocomplete="off"
																class="form-control" value="<?= $customer->telepon ?>"
																required></td>
													</tr>
													<tr>
														<td>Email</td>
														<td><input type="email" name="email" placeholder="Masukkan Email"
																autocomplete="off" class="form-control"
																value="<?= $customer->email ?>" required></td>
													</tr>
													<tr>
														<td>Alamat</td>
														<td><textarea name="alamat" id="alamat" style="resize: none;"
																class="form-control"
																placeholder="Masukkan Alamat"><?= $customer->alamat ?></textarea>
														</td>
													</tr>
												</thead>
											</table>
										</div>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary"><i
											class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
									<button type="reset" class="btn btn-danger"><i
											class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
								</div>
								</form>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
			<?php $this->load->view('partials/footer.php') ?>
		</div>
	</div>
	<!-- jika ada session sukses maka tampilkan sweet alert dengan pesan yang telah di set
	di dalam session sukses  -->
	<?php if (@$m_customer->hapus->session['success']) { ?>
		<script>
			Swal.fire({
				icon: 'success',
				title: 'Sukses',
				text: 'data berhasil dihapus',
				timer: 3000,
				showConfirmButton: false
			})
		</script>
		<!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
		<?php unset($session['sukses']);
	} ?>
	<!-- di bawah ini adalah script untuk konfirmasi hapus data dengan sweet alert  -->
	<script>
		$('.alert_notif').on('click', function () {
			var getLink = $(this).attr('href');
			Swal.fire({
				title: "Yakin hapus data?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#d33',
				confirmButtonText: 'Ya',
				cancelButtonColor: '#3085d6',
				cancelButtonText: "Batal"
			}).then(result => {
				if (result.isConfirmed) {
					window.location.href = getLink
				}
			})
			return false;
		});
	</script>
</body>

</html>