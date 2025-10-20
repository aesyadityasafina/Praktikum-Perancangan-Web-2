<!DOCTYPE html>
<html>
<head>
    <title>Data Registrasi Mahasiswa Baru</title>
</head>
<body>
<h2>Data Registrasi Mahasiswa Baru</h2>
<hr>

<?php
$no_pendaftaran = $_POST["no_pendaftaran"];
$nama_lengkap   = $_POST["nama_lengkap"];
$jenis_kelamin  = $_POST["jenis_kelamin"];
$tempat_lahir   = $_POST["tempat_lahir"];
$tanggal_lahir  = $_POST["tanggal_lahir"];
$email          = $_POST["email"];
$no_hp          = $_POST["no_hp"];
$prodi          = $_POST["prodi"];
$alamat         = $_POST["alamat"];
?>

<table border="1" cellpadding="8">
    <tr><td>No. Pendaftaran</td><td><?php echo $no_pendaftaran; ?></td></tr>
    <tr><td>Nama Lengkap</td><td><?php echo $nama_lengkap; ?></td></tr>
    <tr><td>Jenis Kelamin</td><td><?php echo $jenis_kelamin; ?></td></tr>
    <tr><td>Tempat, Tanggal Lahir</td><td><?php echo $tempat_lahir . ", " . $tanggal_lahir; ?></td></tr>
    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
    <tr><td>No. HP</td><td><?php echo $no_hp; ?></td></tr>
    <tr><td>Program Studi</td><td><?php echo $prodi; ?></td></tr>
    <tr><td>Alamat Lengkap</td><td><?php echo nl2br($alamat); ?></td></tr>
</table>

</body>
</html>
