<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('partials/head.php') ?>
</head>

<body id="page-top">
	<div id="wrapper">
		<!-- load sidebar -->
		<?php $this->load->view('partials/sidebar.php') ?>
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content" data-url="<?= base_url('user') ?>">
				<!-- load Topbar -->
				<?php $this->load->view('partials/topbar.php') ?>
				<div class="container-fluid">
					<div class="clearfix">
						<div class="float-left">
							<h1 class="h4 m-0 text-gray-800">
								<?= $title ?>
							</h1>
						</div>
						<div class="float-right">
							<a href="<?= base_url('user/export') ?>" class="btn btn-danger btn-sm"><i
									class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>
							<a href="#" class="btn btn-primary btn-sm" type="button" data-toggle="modal"
								data-target="#tambahUser"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>
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
											<td width="5%">No</td>
											<td>Nama</td>
											<td>Email</td>
											<td>Telepon</td>
											<td>Jabatan</td>
											<td>Username</td>
											<td>Status</td>
											<td>Aksi</td>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($all_user as $user): ?>
											<tr>
												<td>
													<?= $no++ ?>
												</td>
												<td>
													<?= $user->nama ?>
												</td>
												<td>
													<?= $user->email ?>
												</td>
												<td>
													<?= $user->telepon ?>
												</td>
												<td>
													<?= $user->level ?>
												</td>
												<td>
													<?= $user->username ?>
												</td>
												<td>
													<?= $user->status ?>
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
														<a class="dropdown-item" type="button" data-toggle="modal"
															data-target="#editUser<?= $user->id ?>">
															<i class="fa fa-pen fa-sm fa-fw sm-2 text-success"></i>
															Edit Data User
														</a>
														<a class="dropdown-item" type="button" data-toggle="modal"
															data-target="#resetPassword<?= $user->id ?>">
															<i class="fa fa-key fa-sm fa-fw sm-2 text-primary"></i>
															Reset Password
														</a>
														<a class="dropdown-item alert_notif" type="button"
															style="color:black"
															href="<?= base_url('user/hapus/' . $user->id) ?>"
															id="alert_notif">
															<i class="fa fa-trash fa-sm fa-fw sm-2 text-danger"></i>
															Hapus User
														</a>
													</div>
												</td>
											<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				<!-- Modals Tambah User -->
				<div id="tambahUser" class="modal fade" role="dialog" data-url="<?= base_url('user') ?>">
					<div class="modal-dialog">
						<div class="modal-content" style=" border-radius:0px;">
							<div class="modal-header" style="background:white;color:#fff;">
								<h5 class="h5 mb-0 font-weight-bold text-gray-800">&nbsp;&nbsp;Tambah User
								</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<div class="modal-body">
								<form action="<?= base_url('user/proses_tambah') ?>" id="form-edit" method="POST">
									<div class="table-responsive">
										<table class="table" width="100%" cellspacing="0">
											<thead>
												<tr>
													<td>Nama</td>
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
													<td>Jabatan</td>
													<td>
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
																class="form-control" name="level" id="level"
																value="Manager" />
															<label class="form-check-label"
																for="inlineRadio1">Manager</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
																class="form-control" name="level" id="level"
																value="Staff Gudang" />
															<label class="form-check-label"
																for="inlineRadio2">Purchasing</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio"
																class="form-control" name="level" id="level"
																value="Staff Gudang" />
															<label class="form-check-label" for="inlineRadio2">Staff
																Gudang</label>
														</div>
													</td>
												</tr>
												<tr>
													<td>Username</td>
													<td><input type="text" name="username"
															placeholder="Masukkan Username" autocomplete="off"
															class="form-control" required></td>
												</tr>
												<tr>
													<td>Password</td>
													<td><input type="text" name="password"
															placeholder="Masukkan Password" autocomplete="off"
															class="form-control" required></td>
												</tr>
												<tr>
													<td><input type="hidden" name="status" value="Aktif"></td>
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

				<!-- Modal Edit Data User -->
				<?php $no = 0;
				foreach ($all_user as $user):
					$no++; ?>
					<div id="editUser<?= $user->id ?>" class="modal fade" role="dialog" data-url="<?= base_url('user') ?>">
						<div class="modal-dialog">
							<div class="modal-content" style=" border-radius:0px;">
								<div class="modal-header" style="background:white;color:#fff;">
									<h5 class="h5 mb-0 font-weight-bold text-gray-800"></i> Edit Data User </h5>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
								<div class="modal-body">
									<form action="<?= base_url('user/proses_edit/' . $user->id) ?>" id="form-tambah"
										method="POST">
										<div class="table-responsive">
											<table class="table" width="100%" cellspacing="0">
												<thead>
													<tr>
														<td>Nama </td>
														<td><input type="text" name="nama" placeholder="Masukkan Nama"
																autocomplete="off" class="form-control"
																value="<?= $user->nama ?>" required></td>
													</tr>
													<tr>
														<td>Telepon</td>
														<td><input type="number" name="telepon"
																placeholder="Masukkan Nomor Telepon" autocomplete="off"
																class="form-control" value="<?= $user->telepon ?>" required>
														</td>
													</tr>
													<tr>
														<td>Email</td>
														<td><input type="email" name="email" placeholder="Masukkan Email"
																autocomplete="off" class="form-control"
																value="<?= $user->email ?>" required></td>
													</tr>
													<tr>
														<td>Jabatan</td>
														<td>
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio"
																	class="form-control" name="level" id="level"
																	value="Manager" <?php echo ($user->level == 'Manager') ? 'checked' : '' ?> />
																<label class="form-check-label"
																	for="inlineRadio1">Manager</label>
															</div>
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio"
																	class="form-control" name="level" id="level"
																	value="Purchasing" <?php echo ($user->level == 'Purchasing') ? 'checked' : '' ?> />
																<label class="form-check-label"
																	for="inlineRadio2">Purchasing</label>
															</div>
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio"
																	class="form-control" name="level" id="level"
																	value="Staff Gudang" <?php echo ($user->level == 'Staff Gudang') ? 'checked' : '' ?> />
																<label class="form-check-label" for="inlineRadio2">Staff
																	Gudang</label>
															</div>
														</td>
													</tr>
													<tr>
														<td>Username</td>
														<td><input type="text" name="username"
																placeholder="Masukkan Username" autocomplete="off"
																class="form-control" value="<?= $user->username ?>"
																required>
														</td>
													</tr>
													<tr>
														<td>Status</td>
														<td>
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio"
																	class="form-control" name="status" id="status"
																	value="Aktif" <?php echo ($user->status == 'Aktif') ? 'checked' : '' ?> />
																<label class="form-check-label"
																	for="inlineRadio1">Aktif</label>
															</div>
															<div class="form-check form-check-inline">
																<input class="form-check-input" type="radio"
																	class="form-control" name="status" id="status"
																	value="Tidak Aktif" <?php echo ($user->status == 'Tidak Aktif') ? 'checked' : '' ?> />
																<label class="form-check-label" for="inlineRadio2">Tidak
																	Aktif</label>
															</div>
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

				<!-- Modal Reset Password -->
				<?php $no = 0;
				foreach ($all_user as $user):
					$no++; ?>
					<div id="resetPassword<?= $user->id ?>" class="modal fade" role="dialog"
						data-url="<?= base_url('user') ?>">
						<div class="modal-dialog">
							<div class="modal-content" style=" border-radius:0px;">
								<div class="modal-header" style="background:white;color:#fff;">
									<h5 class="h5 mb-0 font-weight-bold text-gray-800"></i> Edit Data User </h5>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
								<div class="modal-body">
									<form action="<?= base_url('user/proses_reset_password/' . $user->id) ?>"
										id="form-tambah" method="POST">
										<div class="table-responsive">
											<table class="table" width="100%" cellspacing="0">
												<thead>
													<tr>
														<td>Username</td>
														<td><input type="text" name="username"
																placeholder="Masukkan Username" autocomplete="off"
																class="form-control" value="<?= $user->username ?>"
																readonly>
														</td>
													</tr>
													<tr>
														<td>Password</td>
														<td><input type="text" name="password"
																placeholder="Masukkan Password" autocomplete="off"
																class="form-control" value="<?= $user->password ?>"
																required></td>
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
	<?php $this->load->view('partials/js.php') ?>
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