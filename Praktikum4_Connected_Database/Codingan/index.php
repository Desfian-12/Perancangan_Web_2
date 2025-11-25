<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pasien Klinik Online</title>
</head>
<body>
    <h2>Data Pasien Klinik Online</h2>

    <a href="tambah.php">+ Tambah Pasien Baru</a> |
    <a href="cari.php">Cari Pasien</a>
    <br><br>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID Pasien</th>
            <th>Nama Pasien</th>
            <th>No. Telepon</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>

        <?php
        $data = mysqli_query($koneksi, "SELECT * FROM pasien");
        while ($d = mysqli_fetch_array($data)) {
        ?>
        <tr>
            <td><?= $d['id_pasien']; ?></td>
            <td><?= $d['nama_pasien']; ?></td>
            <td><?= $d['no_telp']; ?></td>
            <td><?= $d['alamat']; ?></td>
            <td><?= $d['tanggal_lahir']; ?></td>
            <td><?= $d['jenis_kelamin']; ?></td>
            <td><?= $d['email']; ?></td>
            <td>
                <a href="edit.php?id=<?= $d['id_pasien']; ?>">Edit</a> |
                <a href="hapus.php?id=<?= $d['id_pasien']; ?>" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
