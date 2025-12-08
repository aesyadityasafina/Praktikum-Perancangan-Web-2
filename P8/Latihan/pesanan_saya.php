<?php
session_start();
include "koneksi.php";

$id_user = $_SESSION['userid'];

$q = mysqli_query($conn, "SELECT * FROM pemesanan WHERE id_user=$id_user ORDER BY id_pesanan DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Pesanan Saya</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>
body { background:#eef2f7; font-family:'Segoe UI'; }
.container-box {
    background:white;
    padding:25px;
    border-radius:12px;
    width:80%;
    margin:auto;
    margin-top:30px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}
</style>

</head>
<body>

<div class="container-box">

<h2>Riwayat Pesanan</h2>
<a href="menu.php" class="btn btn-primary mb-3">Kembali</a>

<table class="table table-bordered table-hover bg-white">
<tr class="table-primary">
    <th>ID</th>
    <th>Tanggal</th>
    <th>Status</th>
</tr>

<?php while ($d = mysqli_fetch_assoc($q)) { ?>
<tr>
    <td><?= $d['id_pesanan']; ?></td>
    <td><?= $d['tanggal']; ?></td>
    <td><b><?= $d['status']; ?></b></td>
</tr>
<?php } ?>

</table>

</div>

</body>
</html>
