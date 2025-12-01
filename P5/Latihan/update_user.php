<?php
require "koneksi.php";

$id_user  = $_POST['id_user'];
$nama     = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$no_telp  = $_POST['no_telp'];
$role     = $_POST['role'];

$sql = "UPDATE user SET 
        nama='$nama',
        username='$username',
        password='$password',
        no_telp='$no_telp',
        role='$role'
        WHERE id_user='$id_user'";

if ($conn->query($sql)) {
    header("Location: data_user.php");
} else {
    echo "Gagal update data";
}
?>
