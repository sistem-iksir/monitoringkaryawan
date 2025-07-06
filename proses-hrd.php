<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "87654321", "bismillah");

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil data dari form
$nama = $_POST['nama'];
$level = $_POST['level'];
$peringkat = $_POST['peringkat'];

// Simpan ke database
$sql = "INSERT INTO hrd (nama, level, peringkat) VALUES ('$nama', '$level', '$peringkat')";

if ($koneksi->query($sql) === TRUE) {
    echo "Data berhasil disimpan!";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

$koneksi->close();
?>
