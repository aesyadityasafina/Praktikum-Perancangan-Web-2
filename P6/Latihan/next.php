<?php
session_start();
?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h2>Halaman Berikutnya</h2>
    <p>Nama: <?php echo $_SESSION['nama_data']; ?></p>
    <p>Umur: <?php echo $_SESSION['umur_data']; ?></p>
    <p>Email: <?php echo $_SESSION['email_data']; ?></p>
    <a href="data.php">Kembali</a>
</div>

<?php session_destroy(); ?>
