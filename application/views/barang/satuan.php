<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('partials/head.php') ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- load sidebar -->
        <?php $this->load->view('partials/sidebar.php') ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content" data-url="<?= base_url('barang/satuan') ?>">
                <!-- load Topbar -->
                <?php $this->load->view('partials/topbar.php') ?>
                <div class="container-fluid">
                    <div class="clearfix">
                        <div class="float-left">
                            <h1 class="h3 m-0 text-gray-800">
                                <?= $title ?>
                            </h1>
                        </div>
                        <div class="float-right">
                            <?php if ($this->session->login['role'] == 'manager' or $this->session->login['role'] == 'purchasing'): ?>
                                <a href="<?= base_url('barang') ?>" class="btn btn-secondary btn-sm"><i
                                        class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
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
                                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="background:#42444e;color:#fff;">
                                            <td width="5%"><strong>No</strong></td>
                                            <td><strong>Kode Satuan</strong></td>
                                            <td><strong>Satuan</strong></td>
                                            <td><strong>Tanggal Daftar</strong></td>
                                            </td>
                                            <?php if ($this->session->login['role'] == 'manager' or $this->session->login['role'] == 'purchasing'): ?>
                                                <td><strong>Aksi</strong></td>
                                            <?php endif ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($all_satuan as $satuan): ?>
                                            <tr>
                                                <td>
                                                    <?= $no++ ?>
                                                </td>
                                                <td>
                                                    <?= $satuan->kode_satuan ?>
                                                </td>
                                                <td>
                                                    <?= $satuan->satuan ?>
                                                </td>
                                                <td>
                                                    <?= $satuan->tgl_daftar ?>

                                                </td>
                                                <?php if ($this->session->login['role'] == 'manager' or $this->session->login['role'] == 'purchasing'): ?>
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
                                                            <a class="dropdown-item" type="button" data-toggle="modal"
                                                                data-target="#editSatuan<?= $satuan->kode_satuan ?>">
                                                                <i class="fa fa-pen fa-sm fa-fw sm-2 text-gray-400"></i>
                                                                Edit Satuan
                                                            </a>

                                                            <a class="dropdown-item alert_notif"
                                                                href="<?= base_url('barang/satuan/hapus/' . $satuan->kode_satuan) ?>"
                                                                id="alert_notif">
                                                                <i class="fa fa-trash fa-sm fa-fw mr-2 text-gray-400"></i>
                                                                Hapus Satuan
                                                            </a>
                                                        </div>
                                                    </td>
                                                <?php endif ?>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modals Edit Satuan -->
                <?php $no = 0; foreach ($all_satuan as $satuan):
                    $no++; ?>
                    <div id="editSatuan<?= $satuan->kode_satuan ?>" class="modal fade" role="dialog"
                        data-url="<?= base_url('barang/satuan') ?>">
                        <div class="modal-dialog">
                            <div class="modal-content" style=" border-radius:0px;">
                                <div class="modal-header" style="background:white;color:#fff;">
                                    <h5 class="h5 mb-0 font-weight-bold text-gray-800"><i class="fa fa-plus"></i> Edit
                                        Satuan
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <div class="modal-body">
                                    <form action="<?= base_url('barang/satuan/proses_edit_satuan'. $satuan->kode_satuan) ?>" id="form-edit"
                                        method="POST">
                                        <div class="table-responsive">
                                            <table class="table" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <td><label for="kode_satuan">Kode Satuan</label></td>
                                                        <td><input type="text" name="kode_satuan"
                                                                placeholder="Masukkan Kode Satuan" autocomplete="off"
                                                                class="form-control" required
                                                                value="<?= $satuan->kode_satuan ?>" maxlength="8" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Satuan</td>
                                                        <td><input type="text" name="satuan" placeholder="Masukkan Satuan"
                                                                autocomplete="off" class="form-control" required
                                                                value="<?= $satuan->satuan ?>"></td>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary"><i
                                            class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                                    <button type="reset" class="btn btn-danger"><i
                                            class="fa fa-times"></i>&nbsp;&nbsp;Batal</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <!-- load footer -->
            <?php $this->load->view('partials/footer.php') ?>
        </div>
    </div>
    <script src="<?= base_url('assets/js/demo/datatables-demo.js') ?>"></script>
    <script src="<?= base_url('assets') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>

</html>