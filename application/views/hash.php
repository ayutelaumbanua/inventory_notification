// Koneksi ke database
$koneksi = mysqli_connect("localhost", "username", "password", "nama_database");

// Ambil nilai username dan password dari formulir login
$username = $_POST['username'];
$password = $_POST['password'];

// Cari pengguna dengan username yang diberikan
$query = "SELECT password_hash FROM users WHERE username = '$username'";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);

if ($row) {
    // Verifikasi password
    $password_hash = $row['password_hash'];
    if (password_verify($password, $password_hash)) {
        // Password cocok, lakukan tindakan setelah berhasil login
        // Misalnya, arahkan pengguna ke halaman selamat datang
        header("Location: welcome.php");
        exit();
    } else {
        // Password tidak cocok, tampilkan pesan kesalahan
        echo "Username atau password salah.";
    }
} else {
    // Pengguna tidak ditemukan, tampilkan pesan kesalahan
    echo "Username atau password salah.";
}

// Tutup koneksi ke database
mysqli_close($koneksi);
