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
		<table table="table table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<td><strong>No</strong></td>
					<td><strong>Nama Customer</strong></td>
					<td><strong>Telepon</strong></td>
					<td><strong>Email</strong></td>
					<td><strong>Alamat</strong></td>
					<td><strong>Tanggal Daftar</strong></td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($all_customer as $customer): ?>
					<tr>
						<td>
							<?= $no++ ?>
						</td>
						<td>
							<?= $customer->nama ?>
						</td>
						<td>
							<?= $customer->telepon ?>
						</td>
						<td>
							<?= $customer->email ?>
						</td>
						<td>
							<?= $customer->alamat ?>
						</td>
						<td>
							<?= $customer->tgl_daftar ?>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>

</html>