<?php
require_once 'db.php';

// Define nama tabel dan kolom sebagai konstanta
define('TABLE_NAME', 'jadwal_pkl');
define('COL_ID', 'id');
define('COL_TANGGAL', 'tanggal');
define('COL_STATUS_KEHADIRAN', 'status_kehadiran');
define('COL_WAKTU_DATANG', 'waktu_datang');
define('COL_WAKTU_PULANG', 'waktu_pulang');
define('COL_NAMA_PEKERJAAN', 'nama_pekerjaan');
define('COL_MULAI_PEKERJAAN', 'mulai_pekerjaan');
define('COL_SELESAI_PEKERJAAN', 'selesai_pekerjaan');
define('COL_URAIAN_PEKERJAAN', 'uraian_pekerjaan');
define('COL_KENDALA', 'kendala');

function tambah_data($tanggal, $status_kehadiran, $waktu_datang, $waktu_pulang, $nama_pekerjaan, $mulai_pekerjaan, $selesai_pekerjaan, $uraian_pekerjaan, $kendala)
{
    $db = connect_db();
    $query = "INSERT INTO " . TABLE_NAME . " 
              (" . COL_TANGGAL . ", " . COL_STATUS_KEHADIRAN . ", " . COL_WAKTU_DATANG . ", " . COL_WAKTU_PULANG . ", " . COL_NAMA_PEKERJAAN . ", " . COL_MULAI_PEKERJAAN . ", " . COL_SELESAI_PEKERJAAN . ", " . COL_URAIAN_PEKERJAAN . ", " . COL_KENDALA . ") 
              VALUES (:tanggal, :status_kehadiran, :waktu_datang, :waktu_pulang, :nama_pekerjaan, :mulai_pekerjaan, :selesai_pekerjaan, :uraian_pekerjaan, :kendala)";

    $stmt = $db->prepare($query);

    // Binding parameter dengan bindValue
    $stmt->bindValue(':tanggal', $tanggal, SQLITE3_TEXT);
    $stmt->bindValue(':status_kehadiran', $status_kehadiran, SQLITE3_TEXT);
    $stmt->bindValue(':waktu_datang', $waktu_datang, SQLITE3_TEXT);
    $stmt->bindValue(':waktu_pulang', $waktu_pulang, SQLITE3_TEXT);
    $stmt->bindValue(':nama_pekerjaan', $nama_pekerjaan, SQLITE3_TEXT);
    $stmt->bindValue(':mulai_pekerjaan', $mulai_pekerjaan, SQLITE3_TEXT);
    $stmt->bindValue(':selesai_pekerjaan', $selesai_pekerjaan, SQLITE3_TEXT);
    $stmt->bindValue(':uraian_pekerjaan', $uraian_pekerjaan, SQLITE3_TEXT);
    $stmt->bindValue(':kendala', $kendala, SQLITE3_TEXT);

    return $stmt->execute();
}

function ambil_semua_catatan()
{
    $db = connect_db();
    $query = "SELECT * FROM " . TABLE_NAME;
    $result = $db->query($query);

    if (!$result) {
        return [];
    }

    $res = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $res[] = $row;
    }
    return $res;
}

function ambil_catatan_by_id($id)
{
    $db = connect_db();
    $query = "SELECT * FROM " . TABLE_NAME . " WHERE " . COL_ID . " = :id";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $result = $stmt->execute();

    return $result ? $result->fetchArray(SQLITE3_ASSOC) : false;
}

function update_catatan($id, $tanggal, $status_kehadiran, $waktu_datang, $waktu_pulang, $nama_pekerjaan, $mulai_pekerjaan, $selesai_pekerjaan, $uraian_pekerjaan, $kendala)
{
    $db = connect_db();
    $query = "UPDATE " . TABLE_NAME . " 
              SET " . COL_TANGGAL . " = :tanggal, " . COL_STATUS_KEHADIRAN . " = :status_kehadiran, " . COL_WAKTU_DATANG . " = :waktu_datang, " . COL_WAKTU_PULANG . " = :waktu_pulang, 
              " . COL_NAMA_PEKERJAAN . " = :nama_pekerjaan, " . COL_MULAI_PEKERJAAN . " = :mulai_pekerjaan, " . COL_SELESAI_PEKERJAAN . " = :selesai_pekerjaan, 
              " . COL_URAIAN_PEKERJAAN . " = :uraian_pekerjaan, " . COL_KENDALA . " = :kendala
              WHERE " . COL_ID . " = :id";

    $stmt = $db->prepare($query);

    // Binding parameter
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $stmt->bindValue(':tanggal', $tanggal, SQLITE3_TEXT);
    $stmt->bindValue(':status_kehadiran', $status_kehadiran, SQLITE3_TEXT);
    $stmt->bindValue(':waktu_datang', $waktu_datang, SQLITE3_TEXT);
    $stmt->bindValue(':waktu_pulang', $waktu_pulang, SQLITE3_TEXT);
    $stmt->bindValue(':nama_pekerjaan', $nama_pekerjaan, SQLITE3_TEXT);
    $stmt->bindValue(':mulai_pekerjaan', $mulai_pekerjaan, SQLITE3_TEXT);
    $stmt->bindValue(':selesai_pekerjaan', $selesai_pekerjaan, SQLITE3_TEXT);
    $stmt->bindValue(':uraian_pekerjaan', $uraian_pekerjaan, SQLITE3_TEXT);
    $stmt->bindValue(':kendala', $kendala, SQLITE3_TEXT);

    return $stmt->execute();
}

function hapus_catatan($id)
{
    $db = connect_db();
    $query = "DELETE FROM " . TABLE_NAME . " WHERE " . COL_ID . " = :id";
    $stmt = $db->prepare($query);

    // Binding parameter
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);

    return $stmt->execute();
}
