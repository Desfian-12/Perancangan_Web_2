<?php
include "koneksi.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id_pasien'];
    $nama = $_POST['nama_pasien'];
    $telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $tgl = $_POST['tanggal_lahir'];
    $jk = $_POST['jenis_kelamin'];
    $email = $_POST['email'];

    $query = "INSERT INTO pasien VALUES ('$id','$nama','$telp','$alamat','$tgl','$jk','$email')";
    mysqli_query($koneksi, $query);

    echo "<script>alert('Data berhasil ditambahkan!');window.location='index.php';</script>";
}
?>

<h2>Tambah Data Pasien</h2>
<form method="post">
    ID Pasien: <input type="text" name="id_pasien" required><br>
    Nama Pasien: <input type="text" name="nama_pasien" required><br>
    No Telepon: <input type="text" name="no_telp"><br>
    Alamat: <input type="text" name="alamat"><br>
    Tanggal Lahir: <input type="date" name="tanggal_lahir"><br>
    Jenis Kelamin: 
    <select name="jenis_kelamin">
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
    </select><br>
    Email: <input type="email" name="email"><br><br>
    <input type="submit" name="submit" value="Simpan">
</form>

<a href="index.php">Kembali</a>
