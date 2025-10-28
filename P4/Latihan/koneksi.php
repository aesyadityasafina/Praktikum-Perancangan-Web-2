<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "pemesanan_catering";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
echo "Koneksi berhasil!";
?>
