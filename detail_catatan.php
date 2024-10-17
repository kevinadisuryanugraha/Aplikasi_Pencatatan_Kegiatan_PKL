<?php
require_once 'functions.php';

if (!isset($_GET['id'])) {
    echo "Catatan tidak ditemukan.";
    exit;
}

$id = $_GET['id'];
$catatan = ambil_catatan_by_id($id);

if (!$catatan) {
    echo "Catatan tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Catatan PKL</title>
    <link rel="stylesheet" href="css/detail.css">
</head>

<body>
    <div class="container">
        <h2>Detail Catatan Kegiatan PKL</h2>
        <table>
            <tr>
                <th>Tanggal:</th>
                <td><?php echo date('d-m-Y', strtotime($catatan['tanggal'])); ?></td>
            </tr>
            <tr>
                <th>Status Kehadiran:</th>
                <td><?php echo $catatan['status_kehadiran']; ?></td>
            </tr>
            <tr>
                <th>Waktu Datang:</th>
                <td><?php echo $catatan['waktu_datang']; ?></td>
            </tr>
            <tr>
                <th>Waktu Pulang:</th>
                <td><?php echo $catatan['waktu_pulang']; ?></td>
            </tr>
            <tr>
                <th>Nama Pekerjaan:</th>
                <td><?php echo $catatan['nama_pekerjaan']; ?></td>
            </tr>
            <tr>
                <th>Mulai Pekerjaan:</th>
                <td><?php echo $catatan['mulai_pekerjaan']; ?></td>
            </tr>
            <tr>
                <th>Selesai Pekerjaan:</th>
                <td><?php echo $catatan['selesai_pekerjaan']; ?></td>
            </tr>
            <tr>
                <th>Uraian Pekerjaan:</th>
                <td><?php echo $catatan['uraian_pekerjaan']; ?></td>
            </tr>
            <tr>
                <th>Kendala:</th>
                <td><?php echo $catatan['kendala']; ?></td>
            </tr>
        </table>

        <div class="back-link">
            <a href="index.php">Kembali ke Daftar Catatan</a>
        </div>
    </div>
</body>

</html>