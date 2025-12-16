<?php
session_start();
include "koneksi.php";

if (isset($_POST['login'])) {

    $email    = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "
        SELECT * FROM user 
        WHERE email='$email'
        AND password='$password'
        AND is_verified = 1
    ");

    if (mysqli_num_rows($query) > 0) {

        $data = mysqli_fetch_assoc($query);

        $_SESSION['userid'] = $data['id_user'];
        $_SESSION['email']  = $data['email'];
        $_SESSION['role']   = $data['role'];

        header("Location: dashboard.php");
        exit();

    } else {
        $error = "Email / Password salah atau belum verifikasi.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex justify-content-center align-items-center" style="height:100vh; background:linear-gradient(135deg,#2bc0e4,#eaecc6);">

<div class="card p-4 shadow" style="width:380px;">
    <h3 class="text-center mb-3">Login</h3>

    <?php if (isset($error)) { ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php } ?>

    <form method="POST">
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <!-- INI KUNCI UTAMA -->
        <button type="submit" name="login" class="btn btn-primary w-100">
            Login
        </button>
    </form>

    <p class="text-center mt-3">
        Belum punya akun? <a href="register.php">Daftar</a>
    </p>
</div>

</body>
</html>
