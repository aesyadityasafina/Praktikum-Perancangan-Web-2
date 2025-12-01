<link rel="stylesheet" href="style.css">

<h2>Tambah User Catering</h2>

<form action="simpan_user.php" method="post">
    ID User: <br>
    <input type="text" name="id_user" required><br><br>

    Nama: <br>
    <input type="text" name="nama" required><br><br>

    Username: <br>
    <input type="text" name="username" required><br><br>

    Password: <br>
    <input type="password" name="password" required><br><br>

    No Telp: <br>
    <input type="text" name="no_telp" required><br><br>

    Role: <br>
    <select name="role">
        <option value="pelanggan">Pelanggan</option>
        <option value="admin">Admin</option>
        <option value="koki">Koki</option>
        <option value="kurir">Kurir</option>
    </select><br><br>

    <button type="submit">Simpan</button>
</form>

<br>
<a href="data_user.php">Kembali</a>
