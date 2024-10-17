<?php
session_start();
require_once 'functions.php';

$catatan_list = ambil_semua_catatan();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencatatan Jadwal Kegiatan PKL</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div class="container">
        <h2>Jadwal Kegiatan PKL</h2>

        <div class="add-record">
            <a href="tambah_catatan.php">Tambah Catatan</a>
        </div>

        <?php if (empty($catatan_list)): ?>
            <div class="no-data">Belum ada catatan kegiatan PKL.</div>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Status Kehadiran</th>
                        <th>Waktu Datang</th>
                        <th>Waktu Pulang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($catatan_list as $catatan): ?>
                        <tr>
                            <td><?php echo date('d-m-Y', strtotime($catatan['tanggal'])); ?></td>
                            <td><?php echo $catatan['status_kehadiran']; ?></td>
                            <td><?php echo $catatan['waktu_datang']; ?></td>
                            <td><?php echo $catatan['waktu_pulang']; ?></td>
                            <td class="actions">
                                <a href="detail_catatan.php?id=<?php echo $catatan['id']; ?>">Detail</a>
                                |
                                <a href="edit_catatan.php?id=<?php echo $catatan['id']; ?>">Edit</a>
                                |
                                <a href="hapus_catatan.php?id=<?php echo $catatan['id']; ?>" onclick="return confirm('Apakah kamu yakin ingin menghapusnya?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>

</html>