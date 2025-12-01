<?php 
include "koneksi.php"; 
?>
<link rel="stylesheet" href="style.css">

<h2>Data Foto</h2>

<a href="input_foto.php">+ Upload Foto Baru</a>
<br><br>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Foto</th>
    <th>Aksi</th>
</tr>

<?php
$sql = "SELECT * FROM upload_foto ORDER BY id_foto DESC";
$result = $conn->query($sql);

// cek jika query gagal
if (!$result) {
    die("Query Error : " . $conn->error);
}

// cek jika data ada
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id_foto']}</td>
                <td>{$row['nama']}</td>
                <td><img src='foto/{$row['foto']}' width='120'></td>
                <td>
                    <a class='hapus' href='delete.php?id={$row['id_foto']}' onclick=\"return confirm('Hapus foto ini?')\">Delete</a>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4' align='center'>Belum ada data foto</td></tr>";
}
?>
</table>
