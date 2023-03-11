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
			<div id="content" data-url="<?= base_url('barang') ?>">
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
							<?php if ($this->session->login['role'] == 'manager' or $this->session->login['role'] == 'purchasing'): ?>
								<a href="<?= base_url('barang/stock_habis') ?>" class="btn btn-warning btn-sm"><i
										class="fas fa-clipboard-list"></i>&nbsp;&nbsp;Stock Habis </a>
								<a href="<?= base_url('barang/export') ?>" class="btn btn-danger btn-sm"><i
										class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>
								<a href="<?= base_url('barang/tambah') ?>" class="btn btn-primary btn-sm"><i
										class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>
								<a href="<?= base_url('barang/tambah') ?>" type="button" class="btn btn-primary btn-sm"
									data-toggle="modal" data-target="#myModal">
									<i class="fa fa-plus"></i> Versi Modals</a>
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
											<td width="5%">No</td>
											<td>Kode Barang</td>
											<td>Kategori</td>
											<td>Nama Barang</td>
											<td>Stok</td>
											<td>Satuan</td>
											<td>Tanggal Daftar</td>
											</td>
											<?php if ($this->session->login['role'] == 'manager' or $this->session->login['role'] == 'purchasing'): ?>
												<td>Aksi</td>
											<?php endif ?>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($all_barang as $barang): ?>
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
													<?= $barang->tgl_daftar ?>

												</td>
												<?php if ($this->session->login['role'] == 'manager' or $this->session->login['role'] == 'purchasing'): ?>
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
																href="<?= base_url('barang/edit/' . $barang->kode_barang) ?>">
																<i class="fa fa-pen fa-sm fa-fw sm-2 text-gray-400"></i>
																Edit Barang
															</a>
															<a class="dropdown-item"
																onclick="return confirm('apakah anda yakin?')"
																href="<?= base_url('barang/hapus/' . $barang->kode_barang) ?>"
																class="btn btn-danger btn-sm">
																<i class="fa fa-trash fa-sm fa-fw mr-2 text-gray-400"></i>
																Hapus Barang
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

				<!-- versi modals -->
				<div id="myModal" class="modal fade" role="dialog" data-url="<?= base_url('barang') ?>">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content" style=" border-radius:0px;">
							<div class="modal-header" style="background:white;color:#fff;">
								<h5 class="h5 mb-0 font-weight-bold text-gray-800"><i class="fa fa-plus"></i> Tambah
									Barang
								</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<div class="modal-body">
								<form action="<?= base_url('barang/proses_tambah') ?>" id="form-tambah" method="POST">
									<div class="table-responsive">
										<table class="table" width="100%" cellspacing="0">
											<thead>
												<tr>
													<td><label for="kode_barang">Kode Barang</label></td>
													<td><input type="text" name="kode_barang" placeholder="Masukkan Kode
													Barang" autocomplete="off" class="form-control" required value="BRG
													<?= mt_rand(10000, 99999999) ?>" maxlength="8" readonly>
													</td>
												</tr>
												<tr>
													<td>Kategori Barang</td>
													<td><select name="kategori_barang" id="kategori_barang"
															class="form-control" required>
															<option value="">-- Silahkan Pilih --</option>
															<option value="Buah">Buah</option>
															<option value="Daging">Daging</option>
															<option value="Makanan">Makanan</option>
															<option value="Minuman">Minuman</option>
														</select>
													</td>
												</tr>
												<tr>
													<td>Nama Barang</td>
													<td><input type="text" name="nama_barang"
															placeholder="Masukkan Nama Barang" autocomplete="off"
															class="form-control" required></td>
												</tr>
												<tr>
													<td>Stok</td>
													<td><input type="number" name="stok" placeholder="Masukkan Stok"
															autocomplete="off" class="form-control" readonly></td>
												</tr>
												<tr>
													<td>Satuan</td>
													<td><select name="satuan" id="satuan" class="form-control" required>
															<option value="">-- Silahkan Pilih --</option>
															<option value="pcs">Pcs</option>
															<option value="sachet">Sachet</option>
															<option value="renceng">Renceng</option>
															<option value="pak">Pak</option>
															<option value="dus">Dus</option>
															<option value="kg">Kilogram</option>
															<option value="ons">Ons</option>
														</select></td>
												</tr>
												<tr>
													<td>
														Tanggal Daftar
													</td>
													<td><input type="text" name="tgl_daftar"
															value="<?= date("j F Y, G:i"); ?>" readonly
															class="form-control"></td>
												</tr>
												<tr>
													<i class="fa fa-paperclip text-danger"></i>
													<i class="text-danger"> Input <strong>stok</strong> pada Transaksi
														Penerimaan Barang</i>
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

	<?php $this->load->view('partials/js.php') ?>
	<script src="<?= base_url('assets/js/demo/datatables-demo.js') ?>"></script>
	<script src="<?= base_url('assets') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('assets') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>

</html>