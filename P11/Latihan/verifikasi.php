<?php
include "koneksi.php";

// AMBIL EMAIL DARI GET ATAU POST
$email = $_GET['email'] ?? $_POST['email'] ?? '';

if (isset($_POST['verifikasi'])) {
    $kode = $_POST['kode'];

    // DEBUG OPTIONAL (hapus nanti)
    // echo $email . " - " . $kode;

    $cek = mysqli_query($conn, "
        SELECT * FROM user 
        WHERE email='$email' 
        AND kode_verifikasi='$kode'
    ");

    if (mysqli_num_rows($cek) > 0) {

        mysqli_query($conn, "
            UPDATE user 
            SET is_verified = 1,
                kode_verifikasi = NULL
            WHERE email='$email'
        ");

        echo "<script>
            alert('Verifikasi berhasil! Silakan login.');
            window.location='login.php';
        </script>";

    } else {
        echo "<script>alert('Kode OTP salah atau email tidak valid!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Verifikasi Email</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height:100vh;">

<div class="card p-4 shadow" style="width:400px;">
    <h4 class="text-center mb-3">Verifikasi Email</h4>
    <p class="text-center">Masukkan kode OTP yang dikirim ke email kamu</p>

    <form method="POST">
        <!-- INI KUNCI UTAMA -->
        <input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">

        <input type="text" name="kode" class="form-control text-center mb-3"
               placeholder="Kode OTP" required>

        <button name="verifikasi" class="btn btn-success w-100">
            Verifikasi
        </button>
    </form>
</div>

</body>
</html>
