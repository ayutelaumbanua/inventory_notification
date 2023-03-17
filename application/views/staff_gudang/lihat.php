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
							<?php if ($this->session->login['role'] == 'manager'): ?>
								<a href="<?= base_url('staff_gudang/export') ?>" class="btn btn-danger btn-sm"><i
										class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>
								<a href="#" class="btn btn-primary btn-sm" type="button" data-toggle="modal"
									data-target="#tambahStaffGudang"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>
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
											<td width="5%"><strong>No</strong></td>
											<td width="10%"><strong>ID Staff</strong></td>
											<td><strong>Nama</strong></td>
											<td><strong>Email</strong></td>
											<td><strong>Telepon</strong></td>
											<td><strong>Alamat</strong></td>
											<td><strong>Username</strong></td>
											<?php if ($this->session->login['role'] == 'manager'): ?>
												<td><strong>Password</strong></td>
												<td><strong>Aksi</strong></td>
											<?php endif ?>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($all_staff_gudang as $staff_gudang): ?>
											<tr>
												<td>
													<?= $no++ ?>
												</td>
												<td>
													<?= $staff_gudang->kode ?>
												</td>
												<td>
													<?= $staff_gudang->nama ?>
												</td>
												<td>
													<?= $staff_gudang->email ?>
												</td>
												<td>
													<?= $staff_gudang->telepon ?>
												</td>
												<td>
													<?= $staff_gudang->alamat ?>
												</td>
												<td>
													<?= $staff_gudang->username ?>
												</td>
												<?php if ($this->session->login['role'] == 'manager'): ?>
													<td>
														<?= $staff_gudang->password ?>
													</td>
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
															<a class="dropdown-item text-blue-600"
																href="<?= base_url('staff_gudang/edit/' . $staff_gudang->id) ?>">
																<i class="fa fa-pen fa-sm fa-fw sm-2 text-blue-600"></i>
																Edit Staff Gudang
															</a>
															<a class="dropdown-item"
																onclick="return confirm('apakah anda yakin?')"
																href="<?= base_url('staff_gudang/hapus/' . $staff_gudang->id) ?>"
																class="btn btn-danger btn-sm">
																<i class="fa fa-trash fa-sm fa-fw mr-2 text-gray-400"></i>
																Hapus Staff Gudang
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
				<!-- Modals Tambah Staff Gudang -->
				<div id="tambahStaffGudang" class="modal fade" role="dialog" data-url="<?= base_url('staff_gudang') ?>">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content" style=" border-radius:0px;">
							<div class="modal-header" style="background:white;color:#fff;">
								<h5 class="h5 mb-0 font-weight-bold text-gray-800"><i class="fa fa-plus"></i>
									Tambah Staff Gudang
								</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<div class="modal-body">
								<form action="<?= base_url('staff_gudang/proses_tambah') ?>" id="form-edit"
									method="POST">
									<div class="table-responsive">
										<table class="table" width="100%" cellspacing="0">
											<thead>
												<tr>
													<td><label for="kode_barang">Kode Staff Gudang</label></td>
													<td><input type="text" name="kode" placeholder="Masukkan Kode"
															autocomplete="off" class="form-control" required
															value="STG<?= mt_rand(100, 999) ?>" maxlength="8" readonly>
													</td>
												</tr>
												<tr>
													<td>Nama Staff Gudang</td>
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
													<td>Username</td>
													<td><input type="text" name="username"
															placeholder="Masukkan Username" autocomplete="off"
															class="form-control" required readonly></td>
												</tr>
												<tr>
													<td>Password</td>
													<td><input type="text" name="password"
															placeholder="Masukkan Password" autocomplete="off"
															class="form-control" required></td>
												</tr>
												<tr>
													<td>
														Tanggal Daftar
													</td>
													<td><input type="text" name="tgl_daftar"
															value="<?= date("j F Y, G:i"); ?>" readonly
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
			</div>
			<!-- load footer -->
			<?php $this->load->view('partials/footer.php') ?>
		</div>
	</div>
	<script>
		$(document).ready(function () {
			let username = $('input[name="kode"]').val().split('STG');
			username = 'Staff Gudang-' + username[1]
			$('input[name="username"]').val(username)
		})
	</script>
</body>

</html>