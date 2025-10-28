<?php
include "koneksi.php";

$id_user   = $_POST['id_user'];
$nama      = $_POST['nama'];
$username  = $_POST['username'];
$password  = $_POST['password'];
$no_telp   = $_POST['no_telp'];
$role      = $_POST['role'];

$query = "INSERT INTO user VALUES('$id_user','$nama','$username','$password','$no_telp','$role')";

if (mysqli_query($conn, $query)) {
    echo "Data user berhasil disimpan.";
} else {
    echo "Gagal menyimpan data: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
