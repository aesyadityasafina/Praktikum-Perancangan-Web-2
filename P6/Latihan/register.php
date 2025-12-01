<?php
include "koneksi.php";

if (isset($_POST['register'])) {
    $id_user = $_POST['id_user'];
    $nama    = $_POST['nama'];
    $username= $_POST['username'];
    $password= $_POST['password'];
    $no_telp = $_POST['no_telp'];
    $role    = $_POST['role'];

    $cek = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Username sudah digunakan!');</script>";
    } else {
        mysqli_query($conn, "INSERT INTO user VALUES ('$id_user', '$nama', '$username', '$password', '$no_telp', '$role')");
        echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='login.php';</script>";
    }
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h2>Registrasi</h2>
    <form method="post">
        <input type="text" name="id_user" placeholder="ID User (misal A123)" required>
        <input type="text" name="nama" placeholder="Nama Lengkap" required>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="text" name="no_telp" placeholder="No Telepon" required>

        <select name="role">
            <option value="admin">Admin</option>
            <option value="kurir">Kurir</option>
            <option value="pelanggan">Pelanggan</option>
        </select>

        <input type="submit" name="register" value="Daftar">
    </form>
    <a href="login.php">Sudah punya akun? Login</a>
</div>
