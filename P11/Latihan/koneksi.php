<?php
$conn = mysqli_connect("localhost", "root", "", "pemesanan_catering");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
