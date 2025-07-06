<html>
    <head>
        <title>Menampilkan Data Karyawan</title>
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

        // Mendefinisikan koneksi
        $user = "root";
        $password = "87654321";
        $db = "bismillah";

        // Koneksi ke database menggunakan MySQLi
        $conn = new mysqli('localhost', $user, $password, $db);

        // Mengecek koneksi
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // Query untuk mengambil data karyawan
        $sql = "SELECT target, isi FROM kinerja";
        $result = $conn->query($sql);

        // Mengecek apakah ada data
        if ($result->num_rows > 0) {
            // Menampilkan data dalam tabel
            echo "<table border='1'>";
            echo "<tr>
                    <th>Target</th>
                    <th>isi</th>
                    
                  </tr>";

            // Output data setiap baris
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["target"] . "</td>
                        <td>" . $row["isi"] . "</td>
                        
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "Tidak ada data ditemukan.";
        }

        // Menutup koneksi
        $conn->close();
        ?>
        </div>
    </div>
    </body>
</html>