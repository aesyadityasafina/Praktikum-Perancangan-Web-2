<?php
session_start();

$id = $_POST['id_menu'];
$jumlah = $_POST['jumlah'];

$_SESSION['keranjang'][$id] = $jumlah;

header("Location: checkout.php");
exit();
