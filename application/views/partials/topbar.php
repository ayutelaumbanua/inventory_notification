<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
	<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
		<i class="fa fa-bars"></i>
	</button>
	<ul class="navbar-nav ml-auto">
		<div class="dropdown">
			<li class="nav-item dropdown no-arrow sm-1">
				<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
					aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-bell fa-fw text-warning"></i>
					<span id="notif"></span></a>
				<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
					aria-labelledby="alertsDropdown">
					<a class="dropdown-item text-left medium bg-primary text-white"
						href="#"><strong>Notification</strong></a>
					<div id="dropdown"></div>
					<a class="dropdown-item text-center small text-gray-500"
						href="<?= base_url('barang/stock_habis') ?>">Show All Notification</a>
				</div>
			</li>
		</div>
		<div class="topbar-divider d-none d-sm-block"></div>
		<li class="nav-item dropdown no-arrow">
			<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
				aria-haspopup="true" aria-expanded="false">
				<span class="mr-2 d-none d-lg-inline text-gray-600 large">
					<i class="fas fa-fw fa-user"></i>
					<?php echo $this->session->userdata('nama'); ?>
				</span>
			</a>
			<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
				<a class="dropdown-item" href="<?= base_url('logout') ?>">
					<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
					Logout
				</a>
			</div>
		</li>
	</ul>
</nav>


<?php $this->load->view('partials/js.php') ?>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
	integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
	crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
	integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
	crossorigin="anonymous"></script>
<script>
	$.ajax({
		url: 'barang/get_notification',
		type: 'GET',
		dataType: 'json',
		success: function (data) {
			var i = 0
			var a = 1
			data.forEach(element => {
				if (a <= 3) {
					console.log(a);
					var nama_barang = element.nama_barang
					$('#dropdown').append(
						'<a class="dropdown-item d-flex align-items-center" href="<?= base_url('barang/stock_habis') ?>" id="dropdown">' +
						'<div class="mr-3">' +
						'<div class="icon-circle bg-warning">' +
						'<i class="fas fa-exclamation-triangle text-white"></i></div></div>' +
						'<div>' + '<div class="small text-gray-500" >' + $.timeago(new Date()) + '</div>' +
						'<span class="medium text-black-500">' + nama_barang + ' tersisa ' + element.stok + ' ' + element.satuan + ', lakukan tindakan.</span></div></a >'
					);
				}
				i++
				a++
			});
			$('#notif').append(
				'<span class="badge badge-danger badge-counter" id="notif">' + i + '</span>'
			);
		}
	})
</script>

<script src="https://timeago.yarp.com/jquery.timeago.js" type="text/javascript"></script>