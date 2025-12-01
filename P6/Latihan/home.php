<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h1>Selamat Datang!</h1>
    <h2><?php echo $_SESSION['nama']; ?> (<?php echo $_SESSION['role']; ?>)</h2>

    <a href="dashboard.php">Masuk Dashboard</a>
    <a href="logout.php">Logout</a>
</div>
