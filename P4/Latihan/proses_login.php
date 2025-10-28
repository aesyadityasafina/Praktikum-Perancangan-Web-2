<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

// Cek data user
$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // Login berhasil
    $row = mysqli_fetch_assoc($result);
    $_SESSION['id_user'] = $row['id_user'];
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['role'] = $row['role'];

    echo "<h2>Login berhasil!</h2>";
    echo "<p>Selamat datang, <b>" . $row['nama'] . "</b> (" . $row['role'] . ")</p>";
    echo "<a href='logout.php'>Logout</a>";
} else {
    // Login gagal
    echo "<h2 style='color:red;'>Login gagal!</h2>";
    echo "<p>Username atau password salah.</p>";
    echo "<a href='login.html'>Kembali ke Login</a>";
}

mysqli_close($conn);
?>
