<?php
session_start();
include "koneksi.php";

// CEK LOGIN ADMIN
if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit();
}

// --- PAGINATION SETTING ---
$limit = 5; // jumlah data per halaman
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Query data menu + pagination
$query = mysqli_query($conn, "SELECT * FROM menu ORDER BY id_menu DESC LIMIT $start, $limit");

// Hitung total data
$total_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM menu");
$total_row = mysqli_fetch_assoc($total_result);
$total_data = $total_row['total'];

// Hitung total halaman
$total_pages = ceil($total_data / $limit);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola Menu Catering</title>
    <link rel="stylesheet" 
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        body { background:#eef2f7; font-family:'Segoe UI'; }
        h2 { color:#0d6efd; font-weight:bold; }
        img { border-radius:8px; }
        .pagination a, .pagination span { padding:8px 12px; margin:2px; }
    </style>
</head>
<body>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center">
        <h2>Kelola Menu Catering</h2>
        <a href="tambah_menu.php" class="btn btn-success">+ Tambah Menu</a>
    </div>

    <hr>

    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>ID Kategori</th>
                <th>Foto</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Deskripsi</th>
                <th width="160">Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($m = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td><?= $m['id_menu']; ?></td>
                <td><?= $m['id_kategori']; ?></td>

                <td>
                    <?php if ($m['foto'] != "" && file_exists("upload_foto/" . $m['foto'])) { ?>
                        <img src="upload_foto/<?= $m['foto']; ?>" width="100" height="70" style="object-fit:cover;">
                    <?php } else { ?>
                        <img src="https://via.placeholder.com/100x70?text=No+Image">
                    <?php } ?>
                </td>

                <td><?= $m['nama_menu']; ?></td>
                <td>Rp <?= number_format($m['harga']); ?></td>
                <td><?= $m['status']; ?></td>
                <td><?= $m['deskripsi']; ?></td>

                <td>
                    <a href="edit_menu.php?id=<?= $m['id_menu']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapus_menu.php?id=<?= $m['id_menu']; ?>" 
                       onclick="return confirm('Yakin ingin menghapus menu ini?')" 
                       class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- PAGINATION -->
    <nav>
        <ul class="pagination justify-content-center">

            <!-- Tombol PREV -->
            <?php if ($page > 1) { ?>
                <li class="page-item"><a class="page-link" href="?page=<?= $page-1; ?>">Prev</a></li>
            <?php } else { ?>
                <li class="page-item disabled"><span class="page-link">Prev</span></li>
            <?php } ?>

            <!-- Nomor halaman -->
            <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                    <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                </li>
            <?php } ?>

            <!-- Tombol NEXT -->
            <?php if ($page < $total_pages) { ?>
                <li class="page-item"><a class="page-link" href="?page=<?= $page+1; ?>">Next</a></li>
            <?php } else { ?>
                <li class="page-item disabled"><span class="page-link">Next</span></li>
            <?php } ?>

        </ul>
    </nav>

</div>

</body>
</html>
