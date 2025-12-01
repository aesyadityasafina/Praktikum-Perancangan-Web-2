<?php
session_start();

if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 1;
} else {
    $_SESSION['count']++;
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h2>Demo Session</h2>
    <p>Halaman ini diakses: <?php echo $_SESSION['count']; ?> kali</p>
</div>
