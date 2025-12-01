<?php include "koneksi.php"; ?>
<link rel="stylesheet" href="style.css">

<h2>Form Upload Foto</h2>

<form action="proses_upload.php" method="post" enctype="multipart/form-data">

    Nama Foto:<br>
    <input type="text" name="nama_foto" required><br><br>

    Pilih File Foto:<br>
    <input type="file" name="file_foto" required><br><br>

    <button type="submit">Upload Foto</button>

</form>

<br>
<a href="tampil_foto.php">Lihat Data Foto</a>
