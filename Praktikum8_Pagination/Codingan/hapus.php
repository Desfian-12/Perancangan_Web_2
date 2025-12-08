<?php
include 'koneksi.php';

$id = $_GET['id'];

// ambil data foto
$data = mysqli_query($koneksi, "SELECT Foto FROM foto WHERE Id='$id'");
$d = mysqli_fetch_assoc($data);

// hapus file foto di folder
if (!empty($d['Foto']) && file_exists("gambar/" . $d['Foto'])) {
    unlink("gambar/" . $d['Foto']);
}

// hapus data dari database
mysqli_query($koneksi, "DELETE FROM foto WHERE Id='$id'");

// kembali ke index
header("Location: index.php");
exit;
?>
