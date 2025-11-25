<?php
include "koneksi.php";
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM pasien WHERE id_pasien='$id'");
$d = mysqli_fetch_array($data);

if (isset($_POST['update'])) {
    $nama = $_POST['nama_pasien'];
    $telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $tgl = $_POST['tanggal_lahir'];
    $jk = $_POST['jenis_kelamin'];
    $email = $_POST['email'];

    mysqli_query($koneksi, "UPDATE pasien SET 
        nama_pasien='$nama',
        no_telp='$telp',
        alamat='$alamat',
        tanggal_lahir='$tgl',
        jenis_kelamin='$jk',
        email='$email'
        WHERE id_pasien='$id'");

    echo "<script>alert('Data berhasil diupdate!');window.location='index.php';</script>";
}
?>

<h2>Edit Data Pasien</h2>
<form method="post">
    Nama Pasien: <input type="text" name="nama_pasien" value="<?= $d['nama_pasien']; ?>"><br>
    No Telepon: <input type="text" name="no_telp" value="<?= $d['no_telp']; ?>"><br>
    Alamat: <input type="text" name="alamat" value="<?= $d['alamat']; ?>"><br>
    Tanggal Lahir: <input type="date" name="tanggal_lahir" value="<?= $d['tanggal_lahir']; ?>"><br>
    Jenis Kelamin:
    <select name="jenis_kelamin">
        <option value="L" <?= ($d['jenis_kelamin'] == 'L') ? 'selected' : ''; ?>>Laki-laki</option>
        <option value="P" <?= ($d['jenis_kelamin'] == 'P') ? 'selected' : ''; ?>>Perempuan</option>
    </select><br>
    Email: <input type="email" name="email" value="<?= $d['email']; ?>"><br><br>
    <input type="submit" name="update" value="Simpan Perubahan">
</form>

<a href="index.php">Kembali</a>
