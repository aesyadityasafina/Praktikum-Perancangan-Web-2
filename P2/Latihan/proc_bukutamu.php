<html> 
<head> 
<title>Buku Tamu</title> 
</head> 
<body> 
<?php 
// Ambil data dari form
$nama = $_POST["nama"]; 
$email = $_POST["email"]; 
$komentar = $_POST["komentar"]; 
?> 

<h1>Data Buku Tamu</h1> 
<hr> 
Nama anda : <?php echo htmlspecialchars($nama); ?> 
<br> 
Email address : <?php echo htmlspecialchars($email); ?> 
<br> 
Komentar : 
<br>
<textarea name="komentar" cols="40" rows="5"><?php echo htmlspecialchars($komentar); ?></textarea> 
<br> 

</body> 
</html>
