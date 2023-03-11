<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
	<!-- Sidebar Toggle (Topbar) -->
	<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
		<i class="fa fa-bars"></i>
	</button>
	<!-- Topbar Navbar -->
	<ul class="navbar-nav ml-auto">
		<!-- Nav Item - Alerts -->
		<div class="dropdown">
			<li class="nav-item dropdown no-arrow sm-1">
				<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
					aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-bell fa-fw"></i>
					<span id="notif"></span></a>
				<!-- Dropdown - Alerts -->
				<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
					aria-labelledby="alertsDropdown">
					<a class="dropdown-item text-left medium bg-primary text-white" href="#"><strong>Notification</strong></a>
					<div id="dropdown"></div>
					<a class="dropdown-item text-center small text-gray-500" href="stok_habis">Show All Notification</a>
				</div>
			</li>
		</div>
		<!-- Nav Item - Messages -->
		<div class="topbar-divider d-none d-sm-block"></div>
		<!-- Nav Item - User Information -->
		<li class="nav-item dropdown no-arrow">
			<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
				aria-haspopup="true" aria-expanded="false">
				<span class="mr-2 d-none d-lg-inline text-gray-600 large">
					<i class="fas fa-fw fa-user"></i>
					<?= $this->session->login['nama'] ?>
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
