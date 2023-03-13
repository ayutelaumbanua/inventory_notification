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
					<td><strong>No</strong></td>
					<td><strong>Kode Customer</strong></td>
					<td><strong>Nama Customer</strong></td>
					<td><strong>Telepon</strong></td>
					<td><strong>Email</strong></td>
					<td><strong>Alamat</strong></td>
					<td><strong>Tanggal Daftar</strong></td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($all_supplier as $supplier): ?>
					<tr>
						<td>
							<?= $no++ ?>
						</td>
						<td>
							<?= $supplier->kode ?>
						</td>
						<td>
							<?= $supplier->nama ?>
						</td>
						<td>
							<?= $supplier->telepon ?>
						</td>
						<td>
							<?= $supplier->email ?>
						</td>
						<td>
							<?= $supplier->alamat ?>
						</td>
						<td>
							<?= $supplier->tgl_daftar ?>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>

</html>