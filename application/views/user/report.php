<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?= $title ?>
	</title>
	<style>
		.tabel {
			font-family: sans-serif;
			color: #444;
			border-collapse: collapse;

		}

		.tabel tr th {
			background: #35A9DB;
			color: #fff;
			font-weight: 200;
		}

		.tabel,
		th,
		td {
			padding: 5px 10px;
			text-align: left;
		}

		.tabel tr:hover {
			background-color: #f5f5f5;
		}

		.tabel tr:nth-child(even) {
			background-color: #f2f2f2;
		}
	</style>
</head>

<body>
	<div style="text-align:left">
		<h3>
			<?= $title ?>
		</h3>
	</div>
	<div class="row">
		<table class="tabel" width="100%">
			<thead>
				<tr style="background:#42444e;color:#fff;">
					<td width="5%"><strong>No</strong></td>
					<td><strong>Nama Staff</strong></td>
					<td><strong>Email</strong></td>
					<td><strong>Telpon</strong></td>
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