<?php
session_start();
include 'db.php';
  if ($_SESSION['status_login'] != true) {
  echo '<script>window.location="login.php"</script>';
}
?>
<!doctype html>
<html>
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="shortcut icon" href="unnamed.png">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

    <title>...
    ... Sistem Informasi Akademik Mahasiswa</title>
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top">
        <a class="navbar-brand" href="#"><?php echo $_SESSION['a_global']->admin_name ?> || <b>UNIVERSITAS KATHOLIK SANTO THOMAS MEDAN</b></a>
        
         
          <form class="form-inline my-2 my-lg-0 ml-auto" role="search" method="POST" action="">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" autofocus autocomplete="off">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
          <div class="icon ml-4">
            <h5>
              <i class="fas fa-envelope mr-3" data-toggle="tooltip" title="Inbox"></i> 
              <i class="fas fa-bell mr-3" data-toggle="tooltip" title="Notifikasi"></i>
              <a href="keluar.php" onclick="return confirm('Yakin Untuk Keluar?')"><i class="fas fa-sign-out-alt mr-3" data-toggle="tooltip" title="Sign out"></i></a>
            </h5>
          </div>
        </div>
      </nav>

      <div class="row no-gutters mt-5">
        <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
          <ul class="nav flex-column ml-3 mb-5">
            <li class="nav-item">
              <a class="nav-link active text-white" href="index.php"><i class="fas fa-tachometer-alt mr-2"></i> Dashboard</a><hr class="bg-secondary">
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="mahasiswa.php"><i class="fas fa-user mr-2"></i> User</a><hr class="bg-secondary">
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#"><i class="fas fa-address-book mr-2"></i> Pesan Masuk</a><hr class="bg-secondary">
            </li>
           <li class="nav-item">
              <a class="nav-link text-white" href="pegewai.php"><i class="fas fa-users mr-2"></i> Daftar Pegawai</a><hr class="bg-secondary">
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="jadwal.php"><i class="fas fa-calendar-alt mr-2"></i> Jadwal Kuliah</a><hr class="bg-secondary">
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="nilai.php"><i class="far fa-paper-plane mr-2"></i> Nilai Mahasiswa</a><hr class="bg-secondary">
            </li>
          </ul>
        </div>
        <div class="col-md-10 p-5 pt-2">
         <h3><i class="fas fa-address-book mr-2"></i><strong>DAFTAR CHAT</strong></h3><hr>
         <table class="table table-striped table-bordered">

          <a href="#" class="btn btn-primary mb-3"><i class="fas fa-plus-square mr-2"></i>Tambah Data</a>
                <thead>
                  <tr>
                   <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Nama</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="text-center">Nomor</th>
                    <th scope="col" class="text-center">Alamat</th>
                    <th scope="col" class="text-center">Tanggal</th>
                    <th scope="col" class="text-center">Pesan</th>
                    <th scope="col" class="text-center">Kecamatan</th>
                     <th colspan="3" scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
              $no = 1;
               $pesan_masuk = mysqli_query($conn, "SELECT * FROM pesan_masuk ORDER BY id_pelanggan ASC");
               while ($row = mysqli_fetch_array($pesan_masuk)) {
            ?>
                  <tr>
                    <th scope="row"><?php echo $no++ ?></th>
                    <td> <?php echo $row['nama'] ?></td>
                    <td> <?php echo $row['email'] ?></td>
                    <td> <?php echo $row['nomor'] ?></td>
                    <td> <?php echo $row['alamat'] ?></td>
                    <td> <?php echo $row['tanggal'] ?></td>
                    <td> <?php echo $row['pesan'] ?></td>
                    <td> <?php echo $row['kecamatan'] ?></td>
                    <td><a href="detail.php?ido=<?php echo $row['id_pelanggan'] ?>" class="btn btn-primary">Detail</a></td>
                    <td><a href="edit-dosen.php?ido=<?php echo $row['id_pelanggan'] ?>"><i class="fas fa-edit bg-warning p-2 text-white rounded edit" data-toggle="tooltip" title="Edit"></a></i></td>
                    <td><a href="proses-hapus.php?idd=<?php echo $row['id_pelanggan'] ?>" onclick="return confirm('Yakin Anda Ingin Hapus Data Ini??')"><i class="fas fa-trash-alt bg-danger p-2 text-white rounded hapus" data-toggle="tooltip" title="Delete"></a></i></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
               <a href="export_data_.php" terget="_blank" type="button" class="btn btn-primary">Export To Excel</a>
        
        </div>
      </div>

    
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="admin.js"></script>
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>
  </body>
</html>