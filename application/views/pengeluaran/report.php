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
			<!-- <h4 class="h4 text-dark "><strong><?= $perusahaan->nama_perusahaan ?></strong></h4> -->
		</div>
	</div>
	<hr>
	<div class="row">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<td width="5%"><strong>No</strong></td>
					<td><strong>No Keluar</strong></td>
					<td><strong>Nama Petugas</strong></td>
					<td><strong>Nama Customer</strong></td>
					<td><strong>Tanggal Keluar</strong></td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($all_pengeluaran as $pengeluaran): ?>
					<tr>
						<td>
							<?= $no++ ?>
						</td>
						<td>
							<?= $pengeluaran->no_keluar ?>
						</td>
						<td>
							<?= $pengeluaran->nama_petugas ?>
						</td>
						<td>
							<?= $pengeluaran->nama_customer ?>
						</td>
						<td>
							<?= $pengeluaran->tgl_keluar ?>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>

</html>