<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('partials/head.php') ?>
</head>

<body id="page-top">
	<div id="wrapper">
		<?php $this->load->view('partials/sidebar.php') ?>
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content" data-url="<?= base_url('kategori') ?>">
				<?php $this->load->view('partials/topbar.php') ?>
				<div class="container-fluid">
					<div class="clearfix">
						<div class="float-left">
							<h1 class="h4 m-0 text-gray-800">
								<?= $title ?>
							</h1>
						</div>
						<div class="float-right">
							<a href="<?= base_url('kategori/export') ?>" class="btn btn-danger btn-sm"><i
									class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>
							<?php if ($this->session->userdata('access') != 'Staff Gudang'): ?>
								<span>
									<a href="#" class="btn btn-primary btn-sm" type="button" data-toggle="modal"
										data-target="#tambahKategori"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>
								</span>
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
							<div class="form-row">
							</div>
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr style="background:#42444e;color:#fff;size:100px">
											<td width="5%">No</td>
											<td>Kategori</td>
											<td>Tanggal Daftar</td>
											</td>
											<?php if ($this->session->userdata('access') != 'Staff Gudang'): ?>
												<td width="5%">Aksi</td>
											<?php endif ?>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($all_kategori as $kategori): ?>
											<tr>
												<td>
													<?= $no++ ?>
												</td>
												<td>
													<?= $kategori->kategori ?>
												</td>

												<td>
													<?= date('d-m-Y H:i:s', strtotime($kategori->tgl_daftar)) ?>
												</td>
												<?php if ($this->session->userdata('access') != 'Staff Gudang'): ?>
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
																data-target="#editKategori<?= $kategori->id ?>">
																<i class="fa fa-pen fa-sm fa-fw sm-2 text-primary"></i> Edit
																Kategori</a>
															<a class="dropdown-item alert_notif" style="color:black"
																type="button"
																href="<?= base_url('kategori/hapus/' . $kategori->id) ?>"
																id="alert_notif">
																<i class="fa fa-trash fa-sm fa-fw sm-2 text-danger"></i> Hapus
																Kategori</a>
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

				<!-- Modal Edit Kategori -->
				<?php $no = 0; foreach ($all_kategori as $kategori):
					$no++; ?>
					<div id="editKategori<?= $kategori->id ?>" class="modal fade" role="dialog"
						data-url="<?= base_url('kategori') ?>">
						<div class="modal-dialog">
							<div class="modal-content" style=" border-radius:0px;">
								<div class="modal-header" style="background:white;color:#fff;">
									<h5 class="h5 mb-0 font-weight-bold text-gray-800"><i class="fa fa-plus"></i> Edit
										Kategori
									</h5>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
								<div class="modal-body">
									<form action="<?= base_url('kategori/proses_edit/' . $kategori->id) ?>" method="POST">
										<div class="table-responsive">
											<table class="table" width="100%" cellspacing="0">
												<thead>
													<tr>
														<td>Kategori Barang</td>
														<td><input type="text" name="kategori"
																placeholder="Masukkan Kategori Barang" autocomplete="off"
																class="form-control" required
																value="<?= $kategori->kategori ?>"></td>
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
				<!-- Modal Tambah Kategori -->
				<div id="tambahKategori" class="modal fade" role="dialog" data-url="<?= base_url('kategori') ?>">
					<div class="modal-dialog">
						<div class="modal-content" style=" border-radius:0px;">
							<div class="modal-header" style="background:white;color:#fff;">
								<h5 class="h5 mb-0 font-weight-bold text-gray-800"><i class="fa fa-plus"></i> Tambah
									Kategori
								</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
								<form action="<?= base_url('kategori/proses_tambah') ?>" id="form-tambah" method="POST">
									<div class="table-responsive">
										<table class="table" width="100%" cellspacing="0">
											<thead>
												<tr>
													<td>Kategori Barang</td>
													<td><input type="text" name="kategori"
															placeholder="Masukkan Kategori" autocomplete="off"
															class="form-control" required></td>
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
			</div>
			<?php $this->load->view('partials/footer.php') ?>
		</div>
	</div>
	<?php $this->load->view('partials/js.php') ?>
	<script>
		$('.alert_notif').on('click', function () {
			var getLink = $(this).attr('href');
			Swal.fire({
				title: "Yakin hapus kategori?",
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