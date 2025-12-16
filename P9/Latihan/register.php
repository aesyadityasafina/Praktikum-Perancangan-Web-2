<?php
include "koneksi.php";
require "kirim_email.php";

if (isset($_POST['daftar'])) {

    $nama  = $_POST['nama'];
    $email = $_POST['email'];
    $pass  = $_POST['password'];

    $kode = rand(100000, 999999);

    $simpan = mysqli_query($conn, "
        INSERT INTO user (nama, email, password, kode_verifikasi, is_verified, role)
        VALUES ('$nama', '$email', '$pass', '$kode', 0, 'pelanggan')
    ");

    if ($simpan) {
        kirimOTP($email, $kode);
        header("Location: verifikasi.php?email=$email");
        exit();
    } else {
        echo "Gagal daftar";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
<div class="card mx-auto p-4" style="width:400px;">
<h3 class="text-center">Daftar Akun</h3>

<form method="POST">
    <input type="text" name="nama" class="form-control mb-3" placeholder="Nama" required>
    <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
    <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
    <button name="daftar" class="btn btn-primary w-100">Daftar</button>
</form>

</div>
</div>

</body>
</html>
