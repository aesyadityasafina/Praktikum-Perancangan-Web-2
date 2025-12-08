<?php
session_start();
include "koneksi.php";

$id = $_GET['id'];
$q = mysqli_query($conn, "SELECT * FROM menu WHERE id_menu=$id");
$data = mysqli_fetch_assoc($q);
?>

<!DOCTYPE html>
<html>
<head>
<title>Detail Menu</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>
body { background:#eef2f7; font-family:'Segoe UI'; }
.container-box {
    background:white;
    padding:25px;
    border-radius:12px;
    width:60%;
    margin:auto;
    margin-top:30px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}
</style>

</head>
<body>

<div class="container-box">

<h2><?= $data['nama_menu']; ?></h2>

<img src="upload_foto/<?= $data['foto']; ?>" width="350" class="mb-3" style="border-radius:10px">

<p><?= $data['deskripsi']; ?></p>
<h4 class="text-primary">Rp <?= number_format($data['harga']); ?></h4>

<form method="POST" action="keranjang.php">
    <input type="hidden" name="id_menu" value="<?= $id; ?>">
    <input type="number" name="jumlah" class="form-control" required placeholder="Jumlah"><br>
    <button class="btn btn-success w-100">Tambah ke Keranjang</button>
</form>

</div>

</body>
</html>
