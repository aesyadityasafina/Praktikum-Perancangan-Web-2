<?php
session_start();
include "koneksi.php";

// CEK ADMIN
if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit();
}

// PROSES HAPUS MENU
if (isset($_GET['hapus'])) {
    $hapus = $_GET['hapus'];
    
    // hapus foto juga
    $f = mysqli_fetch_assoc(mysqli_query($conn, "SELECT foto FROM menu WHERE id_menu=$hapus"));
    if ($f['foto'] != "" && file_exists("upload_foto/".$f['foto'])) {
        unlink("upload_foto/".$f['foto']);
    }

    mysqli_query($conn, "DELETE FROM menu WHERE id_menu=$hapus");
    header("Location: admin_menu.php");
    exit();
}

// PROSES TAMBAH MENU
if (isset($_POST['tambah'])) {

    $nama = $_POST['nama_menu'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $status = $_POST['status'];

    // upload foto
    $foto_name = "";
    if ($_FILES['foto']['name'] != "") {
        $foto_name = time() . "_" . $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], "upload_foto/" . $foto_name);
    }

    mysqli_query($conn,
    "INSERT INTO menu (nama_menu, harga, deskripsi, foto, status)
     VALUES ('$nama', '$harga', '$deskripsi', '$foto_name', '$status')");

    header("Location: admin_menu.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin - Kelola Menu</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>
body { background:#eef2f7; font-family:'Segoe UI'; }
.container-box {
    background:white;
    padding:25px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}
.card {
    border:none;
    border-radius:12px;
    box-shadow:0 3px 10px rgba(0,0,0,0.1);
}
</style>

</head>
<body>

<div class="container mt-4">

<h2 class="mb-3">Kelola Menu Catering</h2>
<a href="menu.php" class="btn btn-primary mb-3">Halaman Pelanggan</a>
<a href="logout.php" class="btn btn-danger mb-3 float-end">Logout</a>

<div class="container-box mb-4">
<h4>Tambah Menu Baru</h4>

<form method="POST" enctype="multipart/form-data">

    <label>Nama Menu:</label>
    <input type="text" class="form-control" name="nama_menu" required><br>

    <label>Harga:</label>
    <input type="number" class="form-control" name="harga" required><br>

    <label>Deskripsi:</label>
    <textarea class="form-control" name="deskripsi"></textarea><br>

    <label>Upload Foto:</label>
    <input type="file" class="form-control" name="foto"><br>

    <label>Status:</label>
    <select class="form-control" name="status">
        <option value="tersedia">Tersedia</option>
        <option value="habis">Habis</option>
    </select><br>

    <button class="btn btn-success" name="tambah">Tambah Menu</button>
</form>
</div>

<h4>Daftar Menu</h4>

<table class="table table-bordered bg-white">
<tr class="table-primary">
    <th>Foto</th>
    <th>Nama</th>
    <th>Harga</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

<?php
$menu = mysqli_query($conn, "SELECT * FROM menu ORDER BY id_menu DESC");
while ($m = mysqli_fetch_assoc($menu)) {
?>
<tr>
    <td>
        <?php if ($m['foto'] != "") { ?>
            <img src="upload_foto/<?= $m['foto']; ?>" width="70" style="border-radius:8px;">
        <?php } else { echo "Tidak ada foto"; } ?>
    </td>

    <td><?= $m['nama_menu']; ?></td>
    <td>Rp <?= number_format($m['harga']); ?></td>
    <td><?= $m['status']; ?></td>

    <td>
        <a href="edit_menu.php?id=<?= $m['id_menu']; ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="admin_menu.php?hapus=<?= $m['id_menu']; ?>" 
           onclick="return confirm('Yakin hapus menu ini?')" 
           class="btn btn-danger btn-sm">Hapus</a>
    </td>
</tr>
<?php } ?>

</table>

</div>

</body>
</html>
