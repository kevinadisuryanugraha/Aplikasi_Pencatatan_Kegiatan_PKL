<?php
session_start();
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tanggal = $_POST['tanggal'];
    $status_kehadiran = $_POST['status_kehadiran'];
    $waktu_datang = $_POST['waktu_datang'];
    $waktu_pulang = $_POST['waktu_pulang'];
    $nama_pekerjaan = $_POST['nama_pekerjaan'];
    $mulai_pekerjaan = $_POST['mulai_pekerjaan'];
    $selesai_pekerjaan = $_POST['selesai_pekerjaan'];
    $uraian_pekerjaan = $_POST['uraian_pekerjaan'];
    $kendala = $_POST['kendala'];

    tambah_data($tanggal, $status_kehadiran, $waktu_datang, $waktu_pulang, $nama_pekerjaan, $mulai_pekerjaan, $selesai_pekerjaan, $uraian_pekerjaan, $kendala);

    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Catatan Kegiatan PKL</title>
    <link rel="stylesheet" href="css/tambah.css">
</head>

<body>
    <div class="container">
        <h2>Tambah Catatan Kegiatan PKL</h2>

        <form action="tambah_catatan.php" method="POST">
            <label for="tanggal">Tanggal:</label>
            <input type="date" id="tanggal" name="tanggal" required>

            <label for="status_kehadiran">Status Kehadiran:</label>
            <select id="status_kehadiran" name="status_kehadiran" required>
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
                <option value="Alfa">Alfa</option>
            </select>


            <label for="waktu_datang">Waktu Datang:</label>
            <input type="time" id="waktu_datang" name="waktu_datang" required>

            <label for="waktu_pulang">Waktu Pulang:</label>
            <input type="time" id="waktu_pulang" name="waktu_pulang" required>

            <label for="nama_pekerjaan">Nama Pekerjaan:</label>
            <input type="text" id="nama_pekerjaan" name="nama_pekerjaan" required>

            <label for="mulai_pekerjaan">Mulai Pekerjaan:</label>
            <input type="time" id="mulai_pekerjaan" name="mulai_pekerjaan" required>

            <label for="selesai_pekerjaan">Selesai Pekerjaan:</label>
            <input type="time" id="selesai_pekerjaan" name="selesai_pekerjaan" required>

            <label for="uraian_pekerjaan">Uraian Pekerjaan:</label>
            <textarea id="uraian_pekerjaan" name="uraian_pekerjaan" rows="4" required></textarea>

            <label for="kendala">Kendala:</label>
            <textarea id="kendala" name="kendala" rows="3" required></textarea>

            <button type="submit">Simpan Catatan</button>
        </form>

        <div class="back-link">
            <a href="index.php">Kembali ke Halaman Utama</a>
        </div>
    </div>
</body>

</html>