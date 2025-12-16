<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background-color: #f4f6f9;
}
.sidebar {
    height: 100vh;
    background: #0d6efd;
    color: white;
}
.sidebar a {
    color: white;
    text-decoration: none;
    display: block;
    padding: 12px;
    border-radius: 6px;
}
.sidebar a:hover {
    background: rgba(255,255,255,0.2);
}
.card-icon {
    font-size: 32px;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-primary">
    <div class="container-fluid">
        <span class="navbar-brand">🍽 Catering Online</span>
        <a href="logout.php" class="btn btn-light btn-sm">Logout</a>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">

        <!-- SIDEBAR -->
        <div class="col-md-2 sidebar p-3">
            <h5 class="mb-4">Menu</h5>
            <a href="#">🏠 Dashboard</a>
            <a href="#">📋 Daftar Menu</a>
            <a href="#">🛒 Pesanan Saya</a>
            <a href="#">⚙️ Pengaturan</a>
        </div>

        <!-- KONTEN -->
        <div class="col-md-10 p-4">

            <!-- SELAMAT DATANG -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h4>Login Berhasil 🎉</h4>
                    <p class="mb-0">
                        Selamat datang,
                        <b><?= htmlspecialchars($_SESSION['email']); ?></b>
                    </p>
                    <small class="text-muted">
                        Akun kamu sudah terverifikasi dan aktif.
                    </small>
                </div>
            </div>

            <!-- INFO CARDS -->
            <div class="row">

                <div class="col-md-4">
                    <div class="card shadow-sm text-center">
                        <div class="card-body">
                            <div class="card-icon text-primary">🍱</div>
                            <h5 class="mt-2">Menu Tersedia</h5>
                            <p class="text-muted">Lihat daftar menu catering</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm text-center">
                        <div class="card-body">
                            <div class="card-icon text-success">🛍</div>
                            <h5 class="mt-2">Pesanan</h5>
                            <p class="text-muted">Cek status pesanan kamu</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm text-center">
                        <div class="card-body">
                            <div class="card-icon text-warning">✅</div>
                            <h5 class="mt-2">Status Akun</h5>
                            <p class="text-muted">Terverifikasi</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

</body>
</html>
