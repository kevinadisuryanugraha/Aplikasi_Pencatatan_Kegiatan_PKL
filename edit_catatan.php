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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $tanggal = $_POST['tanggal'];
    $status_kehadiran = $_POST['status_kehadiran'];
    $waktu_datang = $_POST['waktu_datang'];
    $waktu_pulang = $_POST['waktu_pulang'];
    $nama_pekerjaan = $_POST['nama_pekerjaan'];
    $mulai_pekerjaan = $_POST['mulai_pekerjaan'];
    $selesai_pekerjaan = $_POST['selesai_pekerjaan'];
    $uraian_pekerjaan = $_POST['uraian_pekerjaan'];
    $kendala = $_POST['kendala'];

    // Update catatan
    update_catatan($id, $tanggal, $status_kehadiran, $waktu_datang, $waktu_pulang, $nama_pekerjaan, $mulai_pekerjaan, $selesai_pekerjaan, $uraian_pekerjaan, $kendala);

    // Redirect kembali ke halaman index
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Catatan PKL</title>
    <link rel="stylesheet" href="css/edit.css">
</head>

<body>
    <div class="container">
        <h2>Edit Catatan Kegiatan PKL</h2>
        <form action="edit_catatan.php?id=<?php echo $id; ?>" method="POST">
            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" value="<?php echo $catatan['tanggal']; ?>" required>

            <label for="status_kehadiran">Status Kehadiran:</label>
            <input type="text" name="status_kehadiran" id="status_kehadiran" value="<?php echo $catatan['status_kehadiran']; ?>" required>

            <label for="waktu_datang">Waktu Datang:</label>
            <input type="time" name="waktu_datang" id="waktu_datang" value="<?php echo $catatan['waktu_datang']; ?>" required>

            <label for="waktu_pulang">Waktu Pulang:</label>
            <input type="time" name="waktu_pulang" id="waktu_pulang" value="<?php echo $catatan['waktu_pulang']; ?>" required>

            <label for="nama_pekerjaan">Nama Pekerjaan:</label>
            <input type="text" name="nama_pekerjaan" id="nama_pekerjaan" value="<?php echo $catatan['nama_pekerjaan']; ?>" required>

            <label for="mulai_pekerjaan">Mulai Pekerjaan:</label>
            <input type="time" name="mulai_pekerjaan" id="mulai_pekerjaan" value="<?php echo $catatan['mulai_pekerjaan']; ?>" required>

            <label for="selesai_pekerjaan">Selesai Pekerjaan:</label>
            <input type="time" name="selesai_pekerjaan" id="selesai_pekerjaan" value="<?php echo $catatan['selesai_pekerjaan']; ?>" required>

            <label for="uraian_pekerjaan">Uraian Pekerjaan:</label>
            <textarea name="uraian_pekerjaan" id="uraian_pekerjaan" required><?php echo $catatan['uraian_pekerjaan']; ?></textarea>

            <label for="kendala">Kendala:</label>
            <textarea name="kendala" id="kendala"><?php echo $catatan['kendala']; ?></textarea>

            <div class="actions">
                <button type="submit">Update Catatan</button>
                <a href="index.php">Kembali</a>
            </div>
        </form>
    </div>
</body>

</html>