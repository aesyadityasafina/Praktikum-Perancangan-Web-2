<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<link rel="stylesheet" href="style_dashboard.css">

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>Pemesanan Catering</h2>
    <a class="active" href="#">Dashboard</a>
    <a href="#">Data Menu</a>
    <a href="#">Data Pesanan</a>
    <a href="#">Data Pelanggan</a>
    <a href="#">Laporan</a>
    <a href="#">Pengaturan</a>
</div>

<!-- KONTEN -->
<div class="content">

    <!-- HEADER -->
    <div class="header">
        <span>Selamat datang, <b><?php echo $_SESSION['nama']; ?></b></span>
        <a class="logout-btn" href="logout.php">Logout</a>
    </div>

    <!-- WELCOME -->
    <h2 style="margin-top: 25px;">Dashboard Pemesanan Catering</h2>
    <p>Halo <b><?php echo $_SESSION['nama']; ?></b>, selamat datang kembali di sistem pemesanan catering.</p>

    <!-- CARD STATISTIK -->
    <div class="card-container">
        <div class="card">
            <h3>Total Pesanan</h3>
            <div class="angka">12</div>
            <p>Pesanan Masuk</p>
        </div>

        <div class="card">
            <h3>Total Pelanggan</h3>
            <div class="angka">8</div>
            <p>Pelanggan Terdaftar</p>
        </div>

        <div class="card">
            <h3>Pesanan Aktif</h3>
            <div class="angka">5</div>
            <p>Dalam Proses</p>
        </div>
    </div>

</div>
