<?php
session_start();
$id = session_id();
session_destroy();
?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h2>Session Direset</h2>
    <p>ID Session: <?php echo $id; ?></p>
    <a href="session1.php">Kembali</a>
</div>
