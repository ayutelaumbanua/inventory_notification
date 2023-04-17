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
			width: 100%;
		}

		.tabel tr th {
			background: #35A9DB;
			color: #fff;
			font-weight: 200;
		}

		.tabel,
		th,
		td {
			padding: 10px 20px;
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
					<td><strong>Nama</strong></td>
					<td><strong>Telepon</strong></td>
					<td><strong>Email</strong></td>
					<td><strong>Alamat</strong></td>
					<td width="20%"><strong>Tanggal Daftar</strong></td>
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