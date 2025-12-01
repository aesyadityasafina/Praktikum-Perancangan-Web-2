<?php 
require "koneksi.php";
$id = $_GET['id'];

$sql = "SELECT * FROM user WHERE id_user='$id'";
$data = $conn->query($sql)->fetch_assoc();
?>

<link rel="stylesheet" href="style.css">

<h2>Edit User Catering</h2>

<form action="update_user.php" method="post">
    <input type="hidden" name="id_user" value="<?= $data['id_user'] ?>">

    Nama: <br>
    <input type="text" name="nama" value="<?= $data['nama'] ?>" required><br><br>

    Username: <br>
    <input type="text" name="username" value="<?= $data['username'] ?>" required><br><br>

    Password: <br>
    <input type="text" name="password" value="<?= $data['password'] ?>" required><br><br>

    No Telp: <br>
    <input type="text" name="no_telp" value="<?= $data['no_telp'] ?>" required><br><br>

    Role: <br>
    <select name="role">
        <option value="pelanggan" <?= $data['role']=="pelanggan"?"selected":"" ?>>Pelanggan</option>
        <option value="admin" <?= $data['role']=="admin"?"selected":"" ?>>Admin</option>
        <option value="koki" <?= $data['role']=="koki"?"selected":"" ?>>Koki</option>
        <option value="kurir" <?= $data['role']=="kurir"?"selected":"" ?>>Kurir</option>
    </select><br><br>

    <button type="submit">Update</button>
</form>

<br>
<a href="data_user.php">Kembali</a>
