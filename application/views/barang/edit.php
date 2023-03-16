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
							<a href="<?= base_url('barang') ?>" class="btn btn-secondary btn-sm"><i
									class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col">
							<div class="card shadow">
								<div class="card-header"><strong>Isi Form Dibawah Ini</strong></div>
								<div class="card-body">
									<form action="<?= base_url('barang/proses_edit/' . $barang->kode_barang) ?>"
										id="form-tambah" method="POST">
										<div class="form-row">
											<div class="form-group col-3">
												<label for="kode_barang">Kode Barang</label>
											</div>
											<div class="form-group col-4">
												<input type="text" name="kode_barang" placeholder="Masukkan Kode Barang"
													autocomplete="off" class="form-control" required
													value="<?= $barang->kode_barang ?>" maxlength="8" readonly>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-3">
												<label for="kategori_barang">Kategori</label>
											</div>
											<div class="form-group col-4">
												<select name="kategori_barang" id="kategori_barang" class="form-control"
													required>
													<option value="<?= $barang->kategori_barang ?>"><?= $barang->kategori_barang ?></option>
													<option value="Buah">Buah</option>
													<option value="Daging">Daging</option>
													<option value="Makanan">Makanan</option>
													<option value="Minuman">Minuman</option>
												</select>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-3">
												<label for="nama_barang">Nama Barang</label>
											</div>
											<div class="form-group col-4">
												<input type="text" name="nama_barang" placeholder="Masukkan Nama Barang"
													autocomplete="off" class="form-control" required
													value="<?= $barang->nama_barang ?>">
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-3">
												<label for="stok">Stok</label>
											</div>
											<div class="form-group col-4">
												<input type="number" name="stok" placeholder="Masukkan Stok"
													autocomplete="off" class="form-control" required
													value="<?= $barang->stok ?>">
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-3">
												<label for="satuan">Satuan</label>
											</div>
											<div class="form-group col-4">
												<select name="satuan" id="satuan" class="form-control" required>
													<option value="">-- Silahkan Pilih --</option>
													<option value="pcs" <?= $barang->satuan == 'pcs' ? 'selected' : '' ?>>
														Pcs</option>
													<option value="sachet" <?= $barang->satuan == 'sachet' ? 'selected' : '' ?>>Sachet</option>
													<option value="renceng" <?= $barang->satuan == 'renceng' ? 'selected' : '' ?>>Renceng</option>
													<option value="pak" <?= $barang->satuan == 'pak' ? 'selected' : '' ?>>
														Pak</option>
													<option value="kg" <?= $barang->satuan == 'kg' ? 'selected' : '' ?>>
														Kilogram</option>
													<option value="ons" <?= $barang->satuan == 'ons' ? 'selected' : '' ?>>
														Ons</option>
												</select>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-3">
												<label for="satuan">Satuan</label>
											</div>
											<div class="form-group col-4">
												<select name="satuan" id="satuan" class="form-control" required>
													<option value="">-- Silahkan Pilih --</option>
													
												</select>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col-3">
												<label for="tgl_edit">Tanggal Update</label>
											</div>
											<div class="form-group col-4">
												<input type="text" name="tgl_edit" value="<?= date("j F Y, G:i"); ?>"
													readonly class="form-control">
											</div>
										</div>
										<div class="form-row">

										</div>
										<hr>
										<div class="form-group">
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
				</div>
			</div>
			<!-- load footer -->
			<?php $this->load->view('partials/footer.php') ?>
		</div>
	</div>
	<?php $this->load->view('partials/js.php') ?>
</body>

</html>