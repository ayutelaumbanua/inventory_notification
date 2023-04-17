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

		.tabel1 {
			font-family: sans-serif;
			color: #232323;
		}

		.tabel tr th {
			background: #35A9DB;
			color: #fff;
			font-weight: inherit;
			border: 1px solid #666;
			padding: 10px 20px;
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
	<div class="row">
		<div class="col text-center">
			<h3 class="h3 text-dark">
				<?= $title ?>
			</h3>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-4">
			<table class="tabel1">
				<tr>
					<td><strong>No Terima</strong></td>
					<td>:</td>
					<td>
						<?= $penerimaan->no_terima ?>
					</td>
				</tr>
				<tr>
					<td><strong>Nama Petugas</strong></td>
					<td>:</td>
					<td>
						<?= $penerimaan->nama_petugas ?>
					</td>
				</tr>
				<tr>
					<td><strong>Nama Supplier</strong></td>
					<td>:</td>
					<td>
						<?= $penerimaan->nama_supplier ?>
					</td>
				</tr>
				<tr>
					<td><strong>Waktu Terima</strong></td>
					<td>:</td>
					<td>
						<?= date('d-m-Y H:i:s', strtotime($penerimaan->tgl_terima)) ?>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="row">
		<table class="tabel" width="100%">
			<thead>
				<tr style="background:#42444e;color:#fff;">
					<td width="10%"><strong>No</strong></td>
					<td width="40%"><strong>Nama Barang</strong></td>
					<td width="5%"><strong>Jumlah</strong></td>
					<td width="5%"><strong>Satuan</strong></td>
					<td width="40%"><strong>Tanggal Expired</strong></td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($all_detail_penerimaan as $detail_penerimaan): ?>
					<tr>
						<td>
							<?= $no++ ?>
						</td>
						<td>
							<?= $detail_penerimaan->nama_barang ?>
						</td>
						<td>
							<?= $detail_penerimaan->jumlah ?>
						</td>
						<td>
							<?= $detail_penerimaan->satuan ?>
						</td>
						<td>
							<?= $detail_penerimaan->tgl_expired ?>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>

</html>