<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

include "../config/koneksi.php";

/* Ambil data JSON dari body */
$input = json_decode(file_get_contents("php://input"), true);

/* Ambil parameter */
$role = isset($input['role']) ? $input['role'] : '';

/* Query */
$sql = "SELECT id_user, nama, email, role, alamat, no_hp, created_at FROM user";
if ($role != '') {
    $sql .= " WHERE role = '$role'";
}

$query = mysqli_query($koneksi, $sql);

$data = [];
while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}

/* Response JSON */
echo json_encode([
    "status" => true,
    "total"  => count($data),
    "data"   => $data
]);
