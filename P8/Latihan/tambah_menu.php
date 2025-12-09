<?php
include "koneksi.php";

if (isset($_POST['submit'])) {

    $kategori = $_POST['id_kategori'];
    $nama = $_POST['nama_menu'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];
    $deskripsi = $_POST['deskripsi'];

    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    if ($foto != "") {
        move_uploaded_file($tmp, "upload_foto/" . $foto);
    }

    $sql = "INSERT INTO menu (id_kategori, nama_menu, harga, status, foto, deskripsi)
            VALUES ('$kategori', '$nama', '$harga', '$status', '$foto', '$deskripsi')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "<script>alert('Menu berhasil ditambahkan!'); window.location='admin_menu.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Menu</title>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css'>
</head>

<body class='p-4'>
<h3>Tambah Menu Catering</h3>
<hr>

<form method="POST" enctype="multipart/form-data" class="w-50">

    <div class="mb-3">
        <label>ID Kategori</label>
        <input type="text" name="id_kategori" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Nama Menu</label>
        <input type="text" name="nama_menu" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control" required>
            <option value="tersedia">Tersedia</option>
            <option value="habis">Habis</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Foto</label>
        <input type="file" name="foto" class="form-control">
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control"></textarea>
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    <a href="admin_menu.php" class="btn btn-secondary">Kembali</a>

</form>

</body>
</html>
