<?php
include "koneksi.php";

$nama = $_POST['nama_foto'];
$file = $_FILES['file_foto']['name'];
$tmp  = $_FILES['file_foto']['tmp_name'];

$folder = "foto/";

// validasi ekstensi
$ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
$valid = ["jpg", "jpeg", "png", "gif"];

if (!in_array($ext, $valid)) {
    echo "<script>alert('Format file tidak diizinkan!'); window.location='input_foto.php';</script>";
    exit;
}

// nama baru untuk file
$nama_baru = time() . "_" . $file;

// upload file ke folder foto/
if (move_uploaded_file($tmp, $folder . $nama_baru)) {

    // simpan ke database
    $sql = "INSERT INTO upload_foto (nama, foto) VALUES ('$nama', '$nama_baru')";
    $conn->query($sql);

    echo "<script>alert('Upload berhasil!'); window.location='tampil_foto.php';</script>";

} else {
    echo "<script>alert('Upload gagal!'); window.location='input_foto.php';</script>";
}
?>
