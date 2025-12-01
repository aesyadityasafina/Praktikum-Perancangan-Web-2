<?php
require "koneksi.php";

$id = $_GET['id'];

$sql = "DELETE FROM user WHERE id_user='$id'";

if ($conn->query($sql)) {
    header("Location: data_user.php");
} else {
    echo "Gagal menghapus data";
}
?>
