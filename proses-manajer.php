
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simpan Data</title>
    <link rel="stylesheet" href="layout.css">
</head>
<body>
    <div class="opacity">
    <div class="atas">
        <div class="container">PT. IKSIR PLAZA COMPANY</div>
    </div>
    <h1>Sistem Monitoring Kinerja Karyawan</h1>
        <?php
$host = "localhost";
$user = "root";      // sesuaikan dengan user DB kamu
$pass = "87654321";          // sesuaikan jika ada password
$db   = "bismillah"; // ganti dengan nama database kamu

$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$target = $_POST['target'];
$isi = $_POST['isi'];

// Simpan ke database
$sql = "INSERT INTO kinerja (target, isi) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $target, $isi);

if ($stmt->execute()) {
    echo "<p>Catatan berhasil disimpan!<p>";
} else {
    echo "<p>Gagal menyimpan catatan: <p>" . $stmt->error;
}

$stmt->close();
$conn->close();
?>
    </div>
</body>
</html>
