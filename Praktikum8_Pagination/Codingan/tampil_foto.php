<?php
include 'koneksi.php';

// =======================================
// KONFIGURASI PAGINATION
// =======================================
$jumlahDataPerHalaman = 2;

// Hitung total data
$jumlahData = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM foto"));

// Hitung jumlah halaman
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);

// Tentukan halaman aktif
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;

// Hitung awal data
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

// Ambil data sesuai halaman
$data = mysqli_query($koneksi, "SELECT * FROM foto LIMIT $awalData, $jumlahDataPerHalaman");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Foto Member</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            text-align: center;
        }

        .container {
            width: 70%;
            margin: 30px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px #ccc;
        }

        h2 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: auto;
        }

        table th, table td {
            border: 1px solid #bbb;
            padding: 10px;
        }

        table th {
            background: #e0e0e0;
        }

        img {
            border-radius: 5px;
        }

        .pagination a, .pagination strong {
            margin: 5px;
            font-size: 16px;
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 5px;
        }

        .pagination a {
            background: #3498db;
            color: white;
        }

        .pagination a:hover {
            background: #2980b9;
        }

        .pagination strong {
            background: #2ecc71;
            color: white;
        }
    </style>

</head>
<body>

<div class="container">
    <h2>Daftar Foto Member</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>

    <?php while($d = mysqli_fetch_array($data)) { ?>
        <tr>
            <td><?php echo $d['Id']; ?></td>
            <td><?php echo $d['Nama']; ?></td>
            <td>
                <img src="gambar/<?php echo $d['Foto']; ?>" height="100">
            </td>
            <td>
                <a href="hapus.php?id=<?php echo $d['Id']; ?>" 
                   onclick="return confirm('Yakin ingin menghapus data ini?')">
                   Hapus
                </a>
            </td>
        </tr>
    <?php } ?>
    </table>

    <br>

    <!-- PAGINATION -->
    <div class="pagination">
        <?php if ($halamanAktif > 1) : ?>
            <a href="?halaman=<?= $halamanAktif - 1 ?>">◀ Sebelumnya</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
            <?php if ($i == $halamanAktif) : ?>
                <strong><?= $i ?></strong>
            <?php else : ?>
                <a href="?halaman=<?= $i ?>"><?= $i ?></a>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if ($halamanAktif < $jumlahHalaman) : ?>
            <a href="?halaman=<?= $halamanAktif + 1 ?>">Next ▶</a>
        <?php endif; ?>
    </div>

</div>

</body>
</html>
