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
					<td><strong>ID Staff</strong></td>
					<td><strong>Nama Staff</strong></td>
					<td><strong>Email</strong></td>
					<td><strong>Telpon</strong></td>
					<td><strong>Alamat</strong></td>
					<td><strong>Username</strong></td>
					<td><strong>Password</strong></td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($all_purchasing as $purchasing): ?>
					<tr>
						<td>
							<?= $no++ ?>
						</td>
						<td>
							<?= $purchasing->kode ?>
						</td>
						<td>
							<?= $purchasing->nama ?>
						</td>
						<td>
							<?= $purchasing->email ?>
						</td>
						<td>
							<?= $purchasing->telepon ?>
						</td>
						<td>
							<?= $purchasing->alamat?>
						</td>
												<td>
							<?= $purchasing->username ?>
						</td>
						<td>
							<?= $purchasing->password ?>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>

</html>