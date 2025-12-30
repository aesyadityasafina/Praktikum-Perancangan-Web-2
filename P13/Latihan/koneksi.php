<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_catering";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    http_response_code(500);
    echo json_encode([
        "status" => false,
        "message" => "Koneksi database gagal"
    ]);
    exit;
}
?>
