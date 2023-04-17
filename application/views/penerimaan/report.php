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
					<td width="15%"><strong>No Terima</strong></td>
					<td><strong>Nama Petugas</strong></td>
					<td ><strong>Nama Supplier</strong></td>
					<td width="30%"><strong>Tanggal Terima</strong></td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($all_penerimaan as $penerimaan): ?>
					<tr>
						<td>
							<?= $no++ ?>
						</td>
						<td>
							<?= $penerimaan->no_terima ?>
						</td>
						<td>
							<?= $penerimaan->nama_petugas ?>
						</td>
						<td>
							<?= $penerimaan->nama_supplier ?>
						</td>
						<td>
							<?= date('d-m-Y H:i:s', strtotime($penerimaan->tgl_terima)) ?>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>

</html>