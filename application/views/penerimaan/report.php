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
			<!-- <h4 class="h4 text-dark "><strong><?= $perusahaan->nama_perusahaan ?></strong></h4> -->
		</div>
	</div>
	<hr>
	<div class="row">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<td><strong>No</strong></td>
					<td><strong>No Terima</strong></td>
					<td><strong>Nama Petugas</strong></td>
					<td><strong>Nama Supplier</strongg></td>
					<td><strong>Tanggal Terima</strong></td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($all_penerimaan as $penerimaan): ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $penerimaan->no_terima ?></td>
						<td><?= $penerimaan->nama_petugas ?></td>
						<td><?= $penerimaan->nama_supplier ?></td>
						<td><?= $penerimaan->tgl_terima ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>
</html>