<?php
session_start();
include "koneksi.php";

if (isset($_POST['login'])) {
    $u = $_POST['username'];
    $p = $_POST['password'];

    $q = mysqli_query($conn, "SELECT * FROM user WHERE username='$u' AND password='$p'");
    $d = mysqli_fetch_assoc($q);

    if ($d) {
        $_SESSION['userid'] = $d['id_user'];
        $_SESSION['username'] = $d['username'];
        header("Location: menu.php");
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>
    body { background:#eef2f7; font-family:'Segoe UI'; }
    .container-box {
        width: 400px;
        margin:auto;
        margin-top: 70px;
        background:white;
        padding:25px;
        border-radius:12px;
        box-shadow:0 4px 12px rgba(0,0,0,0.1);
    }
    h2 { color:#0d6efd; font-weight:bold; }
</style>

</head>
<body>

<div class="container-box">
<h2>Login</h2>

<form method="POST">
    <input type="text" class="form-control" name="username" placeholder="Username" required><br>
    <input type="password" class="form-control" name="password" placeholder="Password" required><br>
    <button class="btn btn-primary w-100" name="login">Login</button><br><br>
    <a href="register.php">Belum punya akun? Daftar</a>
</form>

<?php if(isset($error)) echo "<p class='text-danger mt-2'>$error</p>"; ?>
</div>

</body>
</html>
