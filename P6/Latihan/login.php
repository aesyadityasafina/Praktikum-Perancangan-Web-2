<?php
session_start();
include "koneksi.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $data = mysqli_fetch_assoc($cek);

    if ($data) {
        $_SESSION['username'] = $data['username'];
        $_SESSION['nama']     = $data['nama'];
        $_SESSION['role']     = $data['role'];

        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>alert('Username atau Password salah!');</script>";
    }
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h2>Login</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Masukkan Username" required>
        <input type="password" name="password" placeholder="Masukkan Password" required>
        <input type="submit" name="login" value="Login">
    </form>
    <a href="register.php">Belum punya akun? Daftar</a>
</div>
