<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title ?></title>
</head>
<body>
	<div class="row">
		<div class="col text-center">
			<h3 class="h3 text-dark"><?= $title ?></h3>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-4">
			<table class="table table-borderless">
				<tr>
					<td><strong>No keluar</strong></td>
					<td>:</td>
					<td><?= $pengeluaran->no_keluar ?></td>
				</tr>
				<tr>
					<td><strong>Nama Petugas</strong></td>
					<td>:</td>
					<td><?= $pengeluaran->nama_petugas ?></td>
				</tr>
				<tr>
					<td><strong>Nama Customer</strong></td>
					<td>:</td>
					<td><?= $pengeluaran->nama_customer ?></td>
				</tr>
				<tr>
					<td><strong>Waktu keluar</strong></td>
					<td>:</td>
					<td><?= $pengeluaran->tgl_keluar ?></td>
				</tr>
			</table>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped" width="100%">
				<thead>
					<tr>
						<td width="10%"><strong>No</strong></td>
						<td width="40%"><strong>Nama Barang</strong></td>
						<td width="20%"><strong>Jumlah</strong></td>
						<td width="20%"><strong>Jumlah</strong></td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($all_detail_pengeluaran as $detail_pengeluaran): ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $detail_pengeluaran->nama_barang ?></td>
							<td><?= $detail_pengeluaran->jumlah ?> </td>
							<td><?= $detail_pengeluaran->satuan ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>