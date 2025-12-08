<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit();
}

$id_user = $_SESSION['userid'];
$keranjang = $_SESSION['keranjang'] ?? [];

if (empty($keranjang)) {
    echo "<h3>Tidak ada pesanan!</h3>";
    exit();
}

mysqli_query($conn, "INSERT INTO pemesanan(id_user, tanggal, status)
                     VALUES($id_user, NOW(), 'Menunggu')");
$id_pesanan = mysqli_insert_id($conn);

foreach ($keranjang as $id_menu => $jumlah) {
    mysqli_query($conn, "INSERT INTO detail_pesanan(id_pesanan, id_menu, jumlah)
                         VALUES($id_pesanan, $id_menu, $jumlah)");
}

unset($_SESSION['keranjang']);

echo "<h2>Pesanan berhasil dibuat!</h2>";
echo "<a href='pesanan_saya.php'>Lihat Pesanan Saya</a>";
