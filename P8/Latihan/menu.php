<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit();
}

$query = mysqli_query($conn, "SELECT COUNT(id_menu) FROM menu");
$row = mysqli_fetch_row($query);
$rows = $row[0];

$page_rows = 6;
$last = ceil($rows / $page_rows);
if ($last < 1) $last = 1;

$pagenum = isset($_GET['pn']) ? $_GET['pn'] : 1;
if ($pagenum < 1) $pagenum = 1;
else if ($pagenum > $last) $pagenum = $last;

$limit = "LIMIT " . ($pagenum - 1) * $page_rows . "," . $page_rows;

$nquery = mysqli_query($conn, "SELECT * FROM menu $limit");

$paginationCtrls = "";
if ($last != 1) {
    if ($pagenum > 1)
        $paginationCtrls .= '<a href="menu.php?pn='.($pagenum-1).'" class="btn btn-warning">Prev</a> ';
    
    $paginationCtrls .= "<b>$pagenum</b> ";

    if ($pagenum < $last)
        $paginationCtrls .= '<a href="menu.php?pn='.($pagenum+1).'" class="btn btn-warning">Next</a>';
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Menu Catering</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>
body { background:#eef2f7; font-family:'Segoe UI'; }
h2 { color:#0d6efd; font-weight:bold; }
.card {
    border:none; border-radius:12px;
    box-shadow:0 4px 12px rgba(0,0,0,0.1);
    transition:0.2s;
}
.card:hover {
    transform:translateY(-5px);
    box-shadow:0 6px 18px rgba(0,0,0,0.15);
}
.pagination a, .pagination b {
    padding:8px 14px;
    background:white;
    border:1px solid #0d6efd;
    border-radius:6px;
    color:#0d6efd;
    margin:2px;
    text-decoration:none;
    font-weight:600;
}
.pagination b { background:#0d6efd; color:white; }
</style>

</head>
<body>

<div class="container mt-4">

<div class="d-flex justify-content-between">
    <h2>Menu Catering</h2>
    <div>
        <a href="pesanan_saya.php" class="btn btn-success">Pesanan Saya</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</div>
<hr>

<div class="row">
<?php while ($m = mysqli_fetch_assoc($nquery)) { ?>
    <div class="col-md-4">
        <div class="card mb-3">
            <img src="upload_foto/<?= $m['foto']; ?>" class="card-img-top" height="180" style="object-fit:cover;">
            <div class="card-body text-center">
                <h5><?= $m['nama_menu']; ?></h5>
                <p class="text-primary fw-bold">Rp <?= number_format($m['harga']); ?></p>
                <a href="detail_menu.php?id=<?= $m['id_menu']; ?>" class="btn btn-primary">Detail</a>
            </div>
        </div>
    </div>
<?php } ?>
</div>

<div class="pagination mt-3"><?= $paginationCtrls ?></div>

</div>
</body>
</html>
