<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?= $title ?>
	</title>
	<style type="text/css">
		body {
			font-family: sans-serif;
		}

		table {
			margin: 20px auto;
			border-collapse: collapse;
			width: 100%;
		}

		table th,
		table td {
			border: 1px solid #3c3c3c;
			padding: 3px 8px;
			text-align: left;
		}

		table th {
			font-weight: bold;
		}

		tr th,
		tr td {
			text-align: left;
		}

		a {
			background: blue;
			color: #fff;
			padding: 8px 10px;
			text-decoration: none;
			border-radius: 3px;
		}
	</style>
</head>

<body>
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Supplier " . date('d-m-Y') . ".xls");
	?>

	<div style="text-align:left">
		<h3 class="h1">
			<?= $title  ?>
		</h3>
	</div>
	<div class="row">
		<table class="tabel" border="1">
			<tr style="background:#42444e;color:#fff;">
				<th>No</th>
				<th>Nama</th>
				<th>Telepon</th>
				<th>Email</th>
				<th>Alamat</th>
				<th>Tanggal Daftar</th>
			</tr>
			<?php foreach ($all_supplier as $supplier): ?>
				<tr>
					<td>
						<?= $no++ ?>
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
						<?= date('d-m-Y H:i:s', strtotime($supplier->tgl_daftar)) ?>
					</td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>
</body>

</html>