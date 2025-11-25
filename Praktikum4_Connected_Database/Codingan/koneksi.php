<?php
$host = "localhost:3307"; // kalau MySQL kamu pakai port 3307
$user = "root";
$pass = "";
$db   = "antrian_klinik";

$koneksi = mysqli_connect("localhost:3307", "root", "", "antrian_klinik");

if (!$koneksi) {
    die("❌ Koneksi gagal: " . mysqli_connect_error());
} else {
    echo "✅ Koneksi berhasil ke database antrian_klinik!";
}
?>