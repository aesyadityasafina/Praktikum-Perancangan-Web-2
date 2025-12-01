<?php
include "koneksi.php";

$id = $_GET['id'];

// ambil nama file dari database
$query = $conn->query("SELECT foto FROM upload_foto WHERE id_foto=$id");
$data  = $query->fetch_assoc();
$foto  = $data['foto'];

// hapus file di folder
if (file_exists("foto/$foto")) {
    unlink("foto/$foto");
}

// hapus dari database
$conn->query("DELETE FROM upload_foto WHERE id_foto=$id");

echo "<script>alert('Foto berhasil dihapus!'); window.location='tampil_foto.php';</script>";
?>
