<?php 
include "koneksi.php";
?>

<link rel="stylesheet" href="style.css">

<h2>Data User Catering</h2>
<a href="tambah_user.php">+ Tambah User</a>

<br><br>

<table>
<tr>
    <th>ID User</th>
    <th>Nama</th>
    <th>Username</th>
    <th>No Telp</th>
    <th>Role</th>
    <th>Aksi</th>
</tr>

<?php
$sql = "SELECT * FROM user ORDER BY id_user ASC";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id_user']}</td>
            <td>{$row['nama']}</td>
            <td>{$row['username']}</td>
            <td>{$row['no_telp']}</td>
            <td>{$row['role']}</td>
            <td>
                <a href='edit_user.php?id={$row['id_user']}'>Edit</a>
                <a class='hapus' href='hapus_user.php?id={$row['id_user']}' 
                   onclick=\"return confirm('Hapus user ini?')\">Hapus</a>
            </td>
          </tr>";
}
?>
</table>
