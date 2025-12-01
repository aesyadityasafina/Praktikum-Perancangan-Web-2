<?php
require "koneksi.php";

$id_user  = $_POST['id_user'];
$nama     = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$no_telp  = $_POST['no_telp'];
$role     = $_POST['role'];

$sql = "INSERT INTO user (id_user, nama, username, password, no_telp, role)
        VALUES ('$id_user', '$nama', '$username', '$password', '$no_telp', '$role')";

if ($conn->query($sql)) {
    header("Location: data_user.php");
} else {
    echo "Gagal menyimpan data";
}
?>
