<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title ?></title>
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
			text-align: left; /* Mengatur teks pada baris tabel menjadi rata tengah */
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
	header("Content-Disposition: attachment; filename=Data Stok Barang Habis " . date('d-m-Y') . ".xls");
	?>

	<div style="text-align:left">
		<h3 class="h1"><?= $title . " " . date('d-m-Y') ?></h3>
	</div>
	<div class="row">
		<table class="tabel" border="1">
			<tr style="background:#42444e;color:#fff;">
				<th>No</th>
				<th>Kode Barang</th>
				<th>Kategori</th>
				<th>Nama Barang</th>
				<th>Stok</th>
				<th>Satuan</th>
				<th>Tanggal</th>
			</tr>
			<?php foreach ($all_barang as $barang): ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $barang->kode_barang ?></td>
					<td><?= $barang->kategori_barang ?></td>
					<td><?= $barang->nama_barang ?></td>
					<td><?= $barang->stok ?></td>
					<td><?= $barang->satuan ?></td>
					<td><?= date('d-m-Y H:i:s', strtotime($barang->tgl_edit)) ?></td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>
</body>

</html>
