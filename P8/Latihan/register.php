<?php
include "koneksi.php";

if (isset($_POST['daftar'])) {
    $nama = $_POST['nama'];
    $user = $_POST['username'];
    $pass = $_POST['password'];

    mysqli_query($conn, "INSERT INTO user(nama, username, password)
                         VALUES('$nama', '$user', '$pass')");
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>
    body { background:#eef2f7; font-family:'Segoe UI'; }
    .container-box {
        width: 400px;
        margin:auto;
        margin-top:60px;
        background:white;
        padding:25px;
        border-radius:12px;
        box-shadow:0 4px 12px rgba(0,0,0,0.1);
    }
    h2 { color:#0d6efd; }
</style>

</head>
<body>

<div class="container-box">
<h2>Daftar Akun</h2>

<form method="POST">
    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required><br>
    <input type="text" class="form-control" name="username" placeholder="Username" required><br>
    <input type="password" class="form-control" name="password" placeholder="Password" required><br>
    <button class="btn btn-success w-100" name="daftar">Daftar</button><br><br>
    <a href="login.php">Sudah punya akun?</a>
</form>
</div>

</body>
</html>
