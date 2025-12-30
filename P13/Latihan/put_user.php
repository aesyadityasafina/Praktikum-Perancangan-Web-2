<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Content-Type");

include "../config/koneksi.php";

/* Ambil JSON dari body raw */
$input = json_decode(file_get_contents("php://input"), true);

/* Validasi */
if (!isset($input['id_user'])) {
    echo json_encode([
        "status" => false,
        "message" => "id_user wajib dikirim"
    ]);
    exit;
}

$id_user  = $input['id_user'];
$nama     = $input['nama'] ?? '';
$email    = $input['email'] ?? '';
$role     = $input['role'] ?? '';
$alamat   = $input['alamat'] ?? '';
$no_hp    = $input['no_hp'] ?? '';

/* Query Update */
$sql = "UPDATE user SET 
            nama='$nama',
            email='$email',
            role='$role',
            alamat='$alamat',
            no_hp='$no_hp'
        WHERE id_user='$id_user'";

$query = mysqli_query($koneksi, $sql);

/* Response */
if ($query) {
    echo json_encode([
        "status" => true,
        "message" => "Data user berhasil diupdate"
    ]);
} else {
    echo json_encode([
        "status" => false,
        "message" => "Gagal update data"
    ]);
}
