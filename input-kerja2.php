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
        // Menampilkan semua error untuk debugging
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

       
        $user = "root";
        $password = "87654321";
        $db = "bismillah";

        // Mengambil data dari form (gunakan $_POST jika form menggunakan metode POST)
        $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $cabang = isset($_POST['cabang']) ? $_POST['cabang'] : '';
        $deadline = isset($_POST['deadline']) ? $_POST['deadline'] : '';
        $complete = isset($_POST['complete']) ? $_POST['complete'] : '';
        $status = isset($_POST['status']) ? $_POST['status'] : '';

        // Mengecek apakah data sudah lengkap
        if (!$nama || !$id || !$cabang || !$deadline || !$complete || !$status ) {
            echo "<p>Semua form harus diisi !!!</p>"; 
            echo "<div class='button-container'>
                    <input type='button' value='Back' class='tombol' onclick='self.history.back();'>
                  </div>";
        } else {
            // Koneksi ke database menggunakan MySQLi
            $conn = new mysqli('localhost', $user, $password, $db);

            // Mengecek koneksi
            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            // Menyiapkan query SQL untuk menghindari SQL Injection
            $stmt = $conn->prepare("INSERT INTO karyawan (nama, id, cabang, deadline, complete, status) VALUES (?, ?, ?, ?, ?, ?)");

            // Cek jika prepare gagal
            if ($stmt === false) {
                die('Kesalahan dalam persiapan query: ' . $conn->error);
            }

            // Menyiapkan parameter query
            $stmt->bind_param("ssssss", $nama, $id, $cabang, $deadline, $complete, $status);

            // Menjalankan query
            if ($stmt->execute()) {
                echo "<p>Data berhasil disimpan</p>";  
            } else {
                echo "Error: " . $stmt->error . "<br>";
            }

            // Menutup koneksi
            $stmt->close();
            $conn->close();
        }
        ?>
    </div>
</body>
</html>