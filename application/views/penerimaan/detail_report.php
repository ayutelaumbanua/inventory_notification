<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>
		<?= $title ?>
	</title>

</head>

<body>
	<div class="row">
		<div class="col text-center">
			<h3 class="h3 text-dark">
				<?= $title ?>
			</h3>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-4">
			<table class="table table-borderless">
				<tr>
					<td><strong>No Terima</strong></td>
					<td>:</td>
					<td>
						<?= $penerimaan->no_terima ?>
					</td>
				</tr>
				<tr>
					<td><strong>Nama Petugas</strong></td>
					<td>:</td>
					<td>
						<?= $penerimaan->nama_petugas ?>
					</td>
				</tr>
				<tr>
					<td><strong>Nama Supplier</strong></td>
					<td>:</td>
					<td>
						<?= $penerimaan->nama_supplier ?>
					</td>
				</tr>
				<tr>
					<td><strong>Waktu Terima</strong></td>
					<td>:</td>
					<td>
						<?= $penerimaan->tgl_terima ?>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered" width="100%">
				<thead>
					<tr>
						<td width="10%"><strong>No</strong></td>
						<td width="40%"><strong>Nama Barang</strong></td>
						<td width="40%"><strong>Jumlah</strong></td>
						<td width="40%"><strong>Tanggal Expired</strong></td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($all_detail_barang_masuk as $detail_barang_masuk): ?>
						<tr>
							<td>
								<?= $no++ ?>
							</td>
							<td>
								<?= $detail_barang_masuk->nama_barang ?>
							</td>
							<td>
								<?= $detail_barang_masuk->jumlah ?>
								<?= $detail_barang_masuk->satuan ?>
							</td>
							<td>
								<?= $detail_barang_masuk->tgl_expired ?>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</body>

</html>