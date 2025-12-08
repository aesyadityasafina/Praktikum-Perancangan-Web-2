<?php
session_start();
include "koneksi.php";

$id = $_GET['id'];
$menu = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM menu WHERE id_menu=$id"));

if (isset($_POST['edit'])) {

    $nama = $_POST['nama_menu'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $status = $_POST['status'];

    $foto_name = $menu['foto'];

    if ($_FILES['foto']['name'] != "") {
        // hapus foto lama
        if ($foto_name != "" && file_exists("upload_foto/".$foto_name)) {
            unlink("upload_foto/".$foto_name);
        }

        // upload baru
        $foto_name = time() . "_" . $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], "upload_foto/" . $foto_name);
    }

    mysqli_query($conn,
    "UPDATE menu SET 
        nama_menu='$nama',
        harga='$harga',
        deskripsi='$deskripsi',
        foto='$foto_name',
        status='$status'
     WHERE id_menu=$id");

    header("Location: admin_menu.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Menu</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<style>
body { background:#eef2f7; font-family:'Segoe UI'; }
.container-box { background:white; padding:25px; border-radius:12px; width:50%; margin:auto; margin-top:40px; }
</style>
</head>

<body>

<div class="container-box">

<h2>Edit Menu</h2>

<form method="POST" enctype="multipart/form-data">

<label>Nama Menu:</label>
<input type="text" class="form-control" name="nama_menu" value="<?= $menu['nama_menu']; ?>" required><br>

<label>Harga:</label>
<input type="number" class="form-control" name="harga" value="<?= $menu['harga']; ?>" required><br>

<label>Deskripsi:</label>
<textarea class="form-control" name="deskripsi"><?= $menu['deskripsi']; ?></textarea><br>

<label>Foto:</label><br>
<?php if ($menu['foto']) { ?>
    <img src="upload_foto/<?= $menu['foto']; ?>" width="120" class="mb-2">
<?php } ?>
<input type="file" class="form-control" name="foto"><br>

<label>Status:</label>
<select class="form-control" name="status">
    <option value="tersedia" <?= ($menu['status']=="tersedia")?"selected":""; ?>>Tersedia</option>
    <option value="habis" <?= ($menu['status']=="habis")?"selected":""; ?>>Habis</option>
</select><br>

<button class="btn btn-primary" name="edit">Simpan Perubahan</button>
<a href="admin_menu.php" class="btn btn-secondary">Batal</a>

</form>
</div>

</body>
</html>
