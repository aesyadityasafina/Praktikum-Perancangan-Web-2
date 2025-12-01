<?php
session_start();
$_SESSION['nama_data']  = $_POST['nama'];
$_SESSION['umur_data']  = $_POST['umur'];
$_SESSION['email_data'] = $_POST['email'];
?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h1>Halo, <?php echo $_SESSION['nama_data']; ?>!</h1>
    <p>Umur Anda: <?php echo $_SESSION['umur_data']; ?></p>
    <p>Email Anda: <?php echo $_SESSION['email_data']; ?></p>
    <a href="next.php">Lanjut</a>
</div>
