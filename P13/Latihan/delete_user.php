<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Content-Type");

include "../config/koneksi.php";

$input = json_decode(file_get_contents("php://input"), true);
$id_user = $input['id_user'] ?? null;

if (!$id_user) {
    echo json_encode([
        "status" => false,
        "message" => "id_user wajib dikirim"
    ]);
    exit;
}

/* Cek user aktif */
$cek = mysqli_query(
    $koneksi,
    "SELECT id_user FROM user 
     WHERE id_user='$id_user' 
     AND deleted_at IS NULL"
);

if (!$cek) {
    echo json_encode([
        "status" => false,
        "message" => "Query error",
        "error" => mysqli_error($koneksi)
    ]);
    exit;
}

if (mysqli_num_rows($cek) == 0) {
    echo json_encode([
        "status" => false,
        "message" => "User tidak ditemukan atau sudah dihapus"
    ]);
    exit;
}

/* Soft delete satu user saja */
$hapus = mysqli_query(
    $koneksi,
    "UPDATE user 
     SET deleted_at = NOW() 
     WHERE id_user='$id_user' 
     AND deleted_at IS NULL"
);

if ($hapus && mysqli_affected_rows($koneksi) == 1) {
    echo json_encode([
        "status" => true,
        "message" => "User berhasil dihapus"
    ]);
} else {
    echo json_encode([
        "status" => false,
        "message" => "Gagal menghapus user"
    ]);
}
