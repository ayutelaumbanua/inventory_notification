<ul class="navbar-nav bg-light sidebar sidebar-light accordion" id="accordionSidebar">
	<a class="sidebar-brand d-flex justify-content-left">
	<img class="mx-full" src="http://localhost/inventori/assets/img/Logo.png" width="150px" height="60px">
	</a>
	<hr class="sidebar-divider my-0">
	<li class="nav-item <?= $aktif == 'dashboard' ? 'active' : '' ?>">
		<a class="nav-link" href="<?= base_url('dashboard') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>
	<hr class="sidebar-divider">
	<div class="sidebar-heading">
		Master
	</div>

	<li class="nav-item <?= $aktif == 'barang' ? 'active' : '' ?>">
		<a class="nav-link" href="<?= base_url('barang') ?>">
			<i class="fas fa-fw fa-box"></i>
			<span>Master Barang</span></a>
	</li>

	<li class="nav-item <?= $aktif == 'customer' ? 'active' : '' ?>">
		<a class="nav-link" href="<?= base_url('customer') ?>">
			<i class="fas fa-fw fa-user"></i>
			<span>Master Customer</span></a>
	</li>

	<li class="nav-item <?= $aktif == 'supplier' ? 'active' : '' ?>">
		<a class="nav-link" href="<?= base_url('supplier') ?>">
			<i class="fas fa-fw fa-truck"></i>
			<span>Master Supplier</span></a>
	</li>
	<!-- Divider -->
	<hr class="sidebar-divider">

	<div class="sidebar-heading">
		Transaksi
	</div>

	<li class="nav-item <?= $aktif == 'penerimaan' ? 'active' : '' ?>">
		<a class="nav-link" href="<?= base_url('penerimaan') ?>">
			<i class="fas fa-fw fa-file-invoice"></i>
			<span>Transaksi Penerimaan</span></a>
	</li>

	<li class="nav-item <?= $aktif == 'pengeluaran' ? 'active' : '' ?>">
		<a class="nav-link" href="<?= base_url('pengeluaran') ?>">
			<i class="fas fa-fw fa-file-invoice"></i>
			<span>Transaksi Pengeluaran</span></a>
	</li>

	<hr class="sidebar-divider">
	<?php if ($this->session->login['role'] == 'manager'): ?>
		<!-- Heading -->
		<div class="sidebar-heading">
			Setting
		</div>

		<li class="nav-item <?= $aktif == 'purchasing' ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('purchasing') ?>">
				<i class="fas fa-fw fa-users"></i>
				<span>Purchasing Account</span></a>
		</li>
		<li class="nav-item <?= $aktif == 'staff_gudang' ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('staff_gudang') ?>">
				<i class="fas fa-fw fa-users"></i>
				<span>Staff Gudang Account</span></a>
		</li>
		<li class="nav-item <?= $aktif == 'manager' ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('manager') ?>">
				<i class="fas fa-fw fa-users"></i>
				<span>Manager Account</span></a>
		</li>
		<li class="nav-item <?= $aktif == 'usaha' ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('usaha') ?>">
				<i class="fas fa-fw fa-business-time"></i>
				<span>Profil Usaha</span></a>
		</li>
		<!-- Divider -->
	<?php endif; ?>
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>
</ul>