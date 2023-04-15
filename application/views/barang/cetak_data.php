<table class="table table-bordered" width="100%">
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
							<?= date('d-m-Y H:i:s', strtotime($barang->tgl_daftar)) ?>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>