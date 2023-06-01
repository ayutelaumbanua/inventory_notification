<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('partials/head.php') ?>
</head>

<body id="page-top">
	<?php
		if (isset($arrlist)) {
			foreach ($arrlist as $key ) {
				?>
				<input type="hidden" name="arrlist" value="<?= $key ?>">
				<?php
			}
		}
	?>
	<div id="wrapper">
		<?php $this->load->view('partials/sidebar.php') ?>
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content" data-url="<?= base_url('pengeluaran') ?>">
				<?php $this->load->view('partials/topbar.php') ?>
				<div class="container-fluid">
					<div class="clearfix">
						<div class="float-left">
							<h1 class="h3 m-0 text-gray-800">
								<?= $title ?>
							</h1>
						</div>
						<div class="float-right">
							<a href="<?= base_url('pengeluaran/export') ?>" class="btn btn-danger btn-sm"><i
									class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>
							<?php if ($this->session->userdata('access') == 'Manager' or $this->session->userdata('access') == 'Staff Gudang'): ?>
								<a href="<?= base_url('pengeluaran/tambah') ?>" class="btn btn-primary btn-sm"><i
										class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>
							<?php endif ?>
						</div>
					</div>
					<hr>
					<?php if ($this->session->flashdata('success')): ?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<?= $this->session->flashdata('success') ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php elseif ($this->session->flashdata('error')): ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<?= $this->session->flashdata('error') ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endif ?>
					<div class="card shadow">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr style="background:#42444e;color:#fff;">
											<td width="5%">No</td>
											<td>No Terima</td>
											<td>Nama Petugas</td>
											<td>Nama Customer</td>
											<td>Tanggal Terima</td>
											<td width="5%">Aksi</td>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($all_pengeluaran as $pengeluaran): ?>
											<tr>
												<td>
													<?= $no++ ?>
												</td>
												<td>
													<?= $pengeluaran->no_keluar ?>
												</td>
												<td>
													<?= $pengeluaran->nama_petugas ?>
												</td>
												<td>
													<?= $pengeluaran->nama_customer ?>
												</td>
												<td>
													<?= date('d-m-Y H:i:s', strtotime($pengeluaran->tgl_keluar)) ?>

												</td>
												<td>
													<a class="dropdown-toggle" href="#" id="userDropdown" role="button"
														data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
														style="color:#42444e">
														<span class="sm-2 d-none d-sm-inline" style="color:#42444e">
															<i class="fa fa-pen"> Edit</i>
														</span>
													</a>
													<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
														aria-labelledby="userDropdown">
														<a class="dropdown-item"
															href="<?= base_url('pengeluaran/detail/' . $pengeluaran->no_keluar) ?>">
															<i class="fa fa-eye fa-sm fa-fw sm-2 text-success"></i> Detail
															Transaksi
														</a>
														<a class="dropdown-item alert_notif" style="color:black"
															type="button"
															href="<?= base_url('pengeluaran/hapus/' . $pengeluaran->no_keluar) ?>"
															id="alert_notif">
															<i class="fa fa-trash fa-sm fa-fw sm-2 text-danger"></i> Hapus
															Transaksi</a>
													</div>
												</td>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php $this->load->view('partials/footer.php') ?>
		</div>
	</div>
	<?php $this->load->view('partials/js.php') ?>
	<!-- di bawah ini adalah script untuk konfirmasi hapus data dengan sweet alert  -->
	<script>
		if (typeof($('input[name=arrlist]')) != "undefined" && $('input[name=arrlist]') !== null) {
			$('input[name=arrlist]').each(function(index) {
				barang = $(this).val();
				console.log(barang);
				const get_low_stock = 'barang/get_stock_low_alert';
				$.ajax({
				url: get_low_stock,
				type: 'POST',
				dataType: 'json',
				data: {
					id: barang
				},
				success: function (data) {
					let perm=Notification.permission;
				// default, granted, denied
				if(!window.Notification)
				{
				  alert('Your system does not support notification');
				}
				else
				{
				  if(Notification.permission==='granted')
				  {
					// show notification
						data.forEach(element => {
							var nama_barang = element.nama_barang
							var greeting=new Notification("Notification",{
								  body:'' + nama_barang + ' tersisa ' + element.stok + ' ' + element.satuan + ', lakukan tindakan!',
								  icon:""
								})
								console.log(greeting);
								greeting.addEventListener("click",function(){
								  window.open("http://localhost/inventori/barang")
								})		
						});
				  }
				  else
				  {
					Notification.requestPermission().then(function(p)
					{
					  if(p==='granted')
					  {
						// show notification
						alert('hey permision taken')
						data.forEach(element => {
							var nama_barang = element.nama_barang
							var greeting=new Notification("Notification",{
								  body:'' + nama_barang + ' tersisa ' + element.stok + ' ' + element.satuan + ', lakukan tindakan!',
								  icon:""
								})
								console.log(greeting);
								greeting.addEventListener("click",function(){
								  window.open("http://localhost/inventori/barang")
								})		
						});
					  }
					  else
					  {
						alert('User Blocked');
			
					  }
					}
					)
				  }
				}
				}
			})	
			});
		}
		$('.alert_notif').on('click', function () {
			var getLink = $(this).attr('href');
			Swal.fire({
				title: "Yakin hapus data?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#d33',
				confirmButtonText: 'Ya',
				cancelButtonColor: '#3085d6',
				cancelButtonText: "Batal"

			}).then(result => {
				if (result.isConfirmed) {
					window.location.href = getLink
				}
			})
			return false;
		});
	</script>
</body>

</html>