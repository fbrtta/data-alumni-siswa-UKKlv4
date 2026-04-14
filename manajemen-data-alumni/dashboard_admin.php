<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['login']) || $_SESSION['role'] != 'admin'){
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="style/dashboard.css">
</head>
<body>

<header>
    <div class="nav-container">
        <h2>Manajemen Data Alumni</h2>
        <a class="logout" href="logout.php">Logout</a>
    </div>
</header>

<div class="container">
    <div class="card">
    <div class="card-header">
        <h3>Daftar Alumni</h3>
        <a class="tambah" href="tambah.php">+ Tambah Data</a>
    </div>

        <table>
            <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Angkatan</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $data = mysqli_query($koneksi, "SELECT * FROM alumni");
                while($d = mysqli_fetch_array($data)){
                ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $d['nama'] ?></td>
                <td><?= $d['angkatan'] ?></td>
                <td><?= $d['jurusan'] ?></td>
                <td>
                    <a class="edit" href="edit.php?id=<?= $d['id_alumni'] ?>">Edit</a>
                    <a class="hapus" href="delete.php?id=<?= $d['id_alumni'] ?>" onclick="return confirm('Hapus data?')">Hapus</a>
                </td>
            </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<footer>
    &copy; <?= date('Y') ?> Febrita Fadillah Mutia - All Rights Reserved
</footer>

</body>
</html>