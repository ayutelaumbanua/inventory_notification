<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?= $title ?>
	</title>
	
</head>

<body>
	<div class="row">
		<div style="text-align:left">
			<h2 class="h1">
				<?= $title ?>
			</h2>
			<h4>
				Nama Usaha :
			</h4>
			<h4>Alamat Usaha : </h4>

		</div>
	</div>
	<hr>
	<div class="row">
		<table class="table table-striped" width="100%">
			<thead>
				<tr>
					<td><strong>No</strong></td>
					<td><strong>Kode Barang</strong></td>
					<td><strong>Kategori</strong></td>
					<td><strong>Nama Barang</strong></td>
					<td><strong>Stok</strong></td>
					<td><strong>Satuan</strong></td>
					<td><strong>Tanggal Daftar</strong></td>
				</tr>

			</thead>
	
			<tbody>
				<?php foreach ($all_barang as $barang): ?>
					<tr>
						<td>
							<?= $no++ ?>
						</td>
						<td>
							<?= $barang->kode_barang ?>
						</td>
						<td>
							<?= $barang->kategori_barang ?>
						</td>
						<td>
							<?= $barang->nama_barang ?>
						</td>
						<td>
							<?= $barang->stok ?>
						</td>
						<td>
							<?= $barang->satuan ?>
						</td>
						<td>
							<?= $barang->tgl_daftar ?>

						</td>
					</tr>

				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>

</html>