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
							<a href="<?= base_url('barang/export') ?>" class="btn btn-danger btn-sm"><i
									class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>
							<?php if ($this->session->userdata('access') != 'Staff Gudang'): ?>
								<span>
									<a href="#" class="btn btn-primary btn-sm" type="button" data-toggle="modal"
										data-target="#tambahBarang"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>
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
								<!-- <div class="form-group col-2">
									<label for="start_date">Tanggal Mulai:</label>
									<input type="date" name="start_date" id="start_date" class="form-control">
								</div>
								<div class="form-group col-2">
									<label for="end_date">Tanggal Akhir:</label>
									<input type="date" name="end_date" id="end_date" class="form-control">
								</div>
								<div class="form-group col-2"> <button id="filter_button">Filter</button>
									<a href="" id="cetak_button">Cetak</a>
								</div> -->
							</div>
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr style="background:#42444e;color:#fff;size:100px">
											<td width="5%">No</td>
											<td>Kode Barang</td>
											<td>Kategori Barang</td>
											<td>Nama Barang</td>
											<td>Stok</td>
											<td>Satuan</td>
											<td>Tanggal Daftar</td>
											</td>
											<?php if ($this->session->userdata('access') != 'Staff Gudang'): ?>
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
													<?= date('d-m-Y H:i:s', strtotime($barang->tgl_daftar)) ?>
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
																data-target="#editBarang<?= $barang->kode_barang ?>">
																<i class="fa fa-pen fa-sm fa-fw sm-2 text-primary"></i> Edit
																Barang</a>
															<a class="dropdown-item alert_notif" style="color:black"
																type="button"
																href="<?= base_url('barang/hapus/' . $barang->kode_barang) ?>"
																id="alert_notif">
																<i class="fa fa-trash fa-sm fa-fw sm-2 text-danger"></i> Hapus
																barang</a>
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

				<!-- Modals Tambah Barang -->
				<div id="tambahBarang" class="modal fade" role="dialog" data-url="<?= base_url('barang') ?>">
					<div class="modal-dialog">
						<div class="modal-content" style=" border-radius:0px;">
							<div class="modal-header" style="background:white;color:#fff;">
								<h5 class="h5 mb-0 font-weight-bold text-gray-800">Tambah
									Barang
								</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<span class="text-sm mb-0 text-danger">Note: Input <strong>stok</strong> pada Transaksi
									Penerimaan Barang
								</span>
							</div>
							<div class="modal-body">
								<form action="<?= base_url('barang/proses_tambah_barang') ?>" id="form-tambah"
									method="POST">
									<div class="table-responsive" styles="font-size:1rem">
										<table class="table" width="100%" cellspacing="0">
											<thead>
												<tr>
													<td><label for="kode_barang">Kode Barang</label></td>
													<td><input type="text" name="kode_barang" placeholder="Masukkan Kode
													Barang" autocomplete="off" class="form-control" required value="BRG<?= mt_rand(10000, 99999999) ?>"
															maxlength="8" readonly>
													</td>
												</tr>
												<tr>
													<td>Kategori</td>
													<td><select name="kategori_barang" id="kategori_barang"
															class="form-control" required>
															<option value="">-- Pilih Kategori --</option>
															<?php foreach ($all_kategori as $kategori): ?>
																<option value="<?= ($kategori->kategori) ?>"><?= $kategori->kategori ?></option>
															<?php endforeach ?>
														</select></td>
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
															<option value="">-- Pilih Satuan --</option>
															<?php foreach ($all_satuan as $satuan): ?>
																<option value="<?= ($satuan->satuan) ?>"><?= $satuan->satuan ?></option>
															<?php endforeach ?>
														</select></td>
												</tr>
												<tr>
													<td><input type="hidden" name="tgl_daftar"
															value="<?= date('Y-m-d H:i:s'); ?>" readonly
															class="form-control"></td>
												</tr>
												<tr>
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

				<!-- Modal Edit Barang -->
				<?php $no = 0; foreach ($all_barang as $barang):
					$no++; ?>
					<div id="editBarang<?= $barang->kode_barang ?>" class="modal fade" role="dialog"
						data-url="<?= base_url('barang') ?>">
						<div class="modal-dialog">
							<div class="modal-content" style=" border-radius:0px;">
								<div class="modal-header" style="background:white;color:#fff;">
									<h5 class="h5 mb-0 font-weight-bold text-gray-800"><i class="fa fa-plus"></i> Edit
										Barang
									</h5>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
								<div class="modal-body">
									<form action="<?= base_url('barang/proses_edit/' . $barang->kode_barang) ?>"
										method="POST">
										<div class="table-responsive">
											<table class="table" width="100%" cellspacing="0">
												<thead>
													<tr>
														<td><label for="kode_barang">Kode Barang</label></td>
														<td><input type="text" name="kode_barang"
																placeholder="Masukkan Kode Barang" autocomplete="off"
																class="form-control" required
																value="<?= $barang->kode_barang ?>" maxlength="8" readonly>
														</td>
													</tr>
													<tr>
														<td>Kategori Barang</td>
														<td><select name="kategori_barang" id="kategori_barang"
																class="form-control" required>
																<option value="<?= $kategori->kategori ?>"><?= $kategori->kategori ?></option>
																<?php foreach ($all_kategori as $kategori): ?>
																	<option value="<?= ($kategori->kategori) ?>"><?= $kategori->kategori ?></option>
																<?php endforeach ?>
															</select></td>
													</tr>
													<tr>
														<td>Nama Barang</td>
														<td><input type="text" name="nama_barang"
																placeholder="Masukkan Nama Barang" autocomplete="off"
																class="form-control" required
																value="<?= $barang->nama_barang ?>"></td>
													</tr>
													<?php if ($this->session->userdata('access') == 'Manager'): ?>
														<tr>
															<td>Stok</td>
															<td> <input type="number" name="stok" placeholder="Masukkan Stok"
																	autocomplete="off" class="form-control" required
																	value="<?= $barang->stok ?>"></td>
														</tr>
													<?php endif ?>
													<tr>
														<td>Satuan</td>
														<td><select name="satuan" id="satuan" class="form-control" required>
																<option value="<?= $barang->satuan ?>"><?= $barang->satuan ?></option>
																<?php foreach ($all_satuan as $satuan): ?>
																	<option value="<?= $satuan->satuan ?>"><?= $satuan->satuan ?></option>
																<?php endforeach ?>
															</select></td>
													</tr>
													<tr>
														<td><input type="hidden" name="tgl_edit"
																value="<?= date('Y-m-d H:i:s'); ?>" readonly
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
				<?php endforeach ?>
				<!-- Modal Tambah Satuan -->
				<div id="tambahSatuan" class="modal fade" role="dialog" data-url="<?= base_url('satuan') ?>">
					<div class="modal-dialog">
						<div class="modal-content" style=" border-radius:0px;">
							<div class="modal-header" style="background:white;color:#fff;">
								<h5 class="h5 mb-0 font-weight-bold text-gray-800"><i class="fa fa-plus"></i> Tambah
									Satuan
								</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
								<form action="<?= base_url('barang/proses_tambah_satuan') ?>" id="form-tambah"
									method="POST">
									<div class="table-responsive">
										<table class="table" width="100%" cellspacing="0">
											<thead>
												<tr>
													<td>Satuan Barang</td>
													<td><input type="text" name="satuan" placeholder="Masukkan Satuan"
															autocomplete="off" class="form-control" required></td>
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
				title: "Yakin hapus barang?",
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
	<script>
		$(document).ready(function () {
			$('#filter_button').click(function () {
				var start_date = $('#start_date').val();
				var end_date = $('#end_date').val();
				var url = 'https://inventorystocknotification.000webhostapp.com/application/controllers/Barang' + start_date + '/' + end_date;
				table.ajax.url(url).load();
				$('#cetak_button').attr('href', 'https://inventorystocknotification.000webhostapp.com/application/views/barangcetak_data/' + start_date + '/' + end_date);
			});
		});
	</script>

</body>

</html>