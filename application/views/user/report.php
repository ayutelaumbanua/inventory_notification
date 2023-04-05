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
		<table class="table" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<td><strong>No</strong></td>
					<td><strong>Nama Staff</strong></td>
					<td><strong>Email</strong></td>
					<td><strong>Telpon</strong></td>
					<td><strong>Alamat</strong></td>
					<td><strong>Username</strong></td>
					<td><strong>Level</strong></td>
					<td><strong>Status</strong></td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($all_user as $user): ?>
					<tr>
						<td>
							<?= $no++ ?>
						</td>
						<td>
							<?= $user->nama ?>
						</td>
						<td>
							<?= $user->email ?>
						</td>
						<td>
							<?= $user->telepon ?>
						</td>
						<td>
							<?= $user->alamat ?>
						</td>
						<td>
							<?= $user->username ?>
						</td>
						<td>
							<?= $user->level ?>
						</td>
						<td>
							<?= $user->status ?>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>

</html>