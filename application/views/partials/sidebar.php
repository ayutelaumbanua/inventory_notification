<ul class="navbar-nav bg-white sidebar sidebar-light accordion" id="accordionSidebar">
	<a class="sidebar-brand d-flex justify-content-left">
		<img class="mx-full" src="https://inventorystocknotification.000webhostapp.com/assets/img/Logo_white.png" width="250px" height="60px">
	</a>
	<hr class="sidebar-divider my-0">
	<li class="nav-item <?= $aktif == 'dashboard' ? 'active' : '' ?>">
		<a class="nav-link" href="<?= base_url('dashboard') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span style="color:#42444e">Dashboard</span></a>
	</li>
	<hr class="sidebar-divider">
	<div class="sidebar-heading" style="color:#42444e">
		Master
	</div>
	<li class="nav-item <?= $aktif == 'barang' ? 'active' : '' ?>">
		<a class="nav-link" href="<?= base_url('barang') ?>">
			<i class="fas fa-fw fa-box"></i>
			<span style="color:#42444e">Master Barang</span></a>
	</li>
	<li class="nav-item <?= $aktif == 'kategori' ? 'active' : '' ?>">
		<a class="nav-link" href="<?= base_url('kategori') ?>">
			<i class="fas fa-fw fa-list"></i>
			<span style="color:#42444e">Master Kategori</span></a>
	</li>
	<li class="nav-item <?= $aktif == 'satuan' ? 'active' : '' ?>">
		<a class="nav-link" href="<?= base_url('satuan') ?>">
			<i class="fas fa-fw fa-list"></i>
			<span style="color:#42444e">Master Satuan</span></a>
	</li>
	<?php if ($this->session->userdata('access') != 'Purchasing'): ?>
		<li class="nav-item <?= $aktif == 'customer' ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('customer') ?>">
				<i class="fas fa-fw fa-user"></i>
				<span style="color:#42444e">Master Customer</span></a>
		</li>
	<?php endif ?>
	<?php if ($this->session->userdata('access') != 'Staff Gudang'): ?>
		<li class="nav-item <?= $aktif == 'supplier' ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('supplier') ?>">
				<i class="fas fa-fw fa-truck"></i>
				<span style="color:#42444e">Master Supplier</span></a>
		</li>
	<?php endif ?>
	<hr class="sidebar-divider">
	<div class="sidebar-heading" style="color:#42444e">
		Transaksi
	</div>
	<?php if ($this->session->userdata('access') != 'Staff Gudang'): ?>
		<li class="nav-item <?= $aktif == 'penerimaan' ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('penerimaan') ?>">
				<i class="fas fa-fw fa-file-invoice"></i>
				<span style="color:#42444e">Transaksi Penerimaan</span></a>
		</li>
	<?php endif ?>
	<?php if ($this->session->userdata('access') != 'Purchasing'): ?>
		<li class="nav-item <?= $aktif == 'pengeluaran' ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('pengeluaran') ?>">
				<i class="fas fa-fw fa-file-invoice"></i>
				<span style="color:#42444e">Transaksi Pengeluaran</span></a>
		</li>
	<?php endif ?>
	<?php if ($this->session->userdata('access') == 'Manager'): ?>
		<hr class="sidebar-divider">
		<div class="sidebar-heading" style="color:#42444e">
			Setting
		</div>
		<li class="nav-item <?= $aktif == 'user' ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('user') ?>">
				<i class="fas fa-fw fa-users"></i>
				<span style="color:#42444e">Management User</span></a>
		</li>
		<li class="nav-item <?= $aktif == 'usaha' ? 'active' : '' ?>">
			<a class="nav-link" href="<?= base_url('usaha') ?>">
				<i class="fas fa-fw fa-business-time"></i>
				<span style="color:#42444e">Profil Usaha</span></a>
		</li>
	<?php endif ?>
	<hr class="sidebar-divider d-none d-md-block">
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>
</ul>