<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "87654321";
$db = "bismillah";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = hash('sha256', $_POST['password']);
$jabatan = $_POST['jabatan'];

// Cek username, password, dan jabatan
$sql = "SELECT * FROM users WHERE username=? AND password=? AND jabatan=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $password, $jabatan);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $_SESSION['username'] = $username;
    $_SESSION['jabatan'] = $jabatan;

    if ($jabatan === 'karyawan') {
        header("Location: input-kerja1.html");
    } elseif ($jabatan === 'hrd') {
        header("Location: data-kerja.php");
    }
    elseif ($jabatan === 'manajer') {
        header("Location: berkas-hrd.php");
    }
    exit();
} else {
    echo "Login gagal. Periksa username, password, atau jabatan.";
}

$conn->close();
?>
