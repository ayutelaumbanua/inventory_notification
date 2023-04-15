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
			<h3>
				<?= $title ?>
			</h3>

		</div>
	</div>
	<hr>
	<div class="row">
		<table class="table table-bordered" width="100%">
			<thead>
				<tr>
					<td><strong>No</strong></td>
					<td><strong>Kategori</strong></td>
					<td><strong>Tanggal Daftar</strong></td>					
				</tr>
			</thead>
			<tbody>
				<?php foreach ($all_kategori as $kategori): ?>
					<tr>
						<td>
							<?= $no++ ?>
						</td>
						<td>
							<?= $kategori->kategori ?>
						</td>
						<td>
							<?= date('d-m-Y H:i:s', strtotime($kategori->tgl_daftar)) ?>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>

</html>