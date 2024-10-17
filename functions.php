<?php
require_once 'db.php';

define('TABLE_NAME', 'jadwal_pkl');

function tambah_data($tanggal, $status_kehadiran, $waktu_datang, $waktu_pulang, $nama_pekerjaan, $mulai_pekerjaan, $selesai_pekerjaan, $uraian_pekerjaan, $kendala)
{
    $db = connect_db();
    $query = "INSERT INTO " . TABLE_NAME . " 
              (tanggal, status_kehadiran, waktu_datang, waktu_pulang, nama_pekerjaan, mulai_pekerjaan, selesai_pekerjaan, uraian_pekerjaan, kendala) 
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
    $query = "SELECT * FROM " . TABLE_NAME . " WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $result = $stmt->execute();

    return $result ? $result->fetchArray(SQLITE3_ASSOC) : false;
}

function update_catatan($id, $tanggal, $status_kehadiran, $waktu_datang, $waktu_pulang, $nama_pekerjaan, $mulai_pekerjaan, $selesai_pekerjaan, $uraian_pekerjaan, $kendala)
{
    $db = connect_db();
    $query = "UPDATE " . TABLE_NAME . " 
              SET tanggal = :tanggal, status_kehadiran = :status_kehadiran, waktu_datang = :waktu_datang, waktu_pulang = :waktu_pulang, 
              nama_pekerjaan = :nama_pekerjaan, mulai_pekerjaan = :mulai_pekerjaan, selesai_pekerjaan = :selesai_pekerjaan, 
              uraian_pekerjaan = :uraian_pekerjaan, kendala = :kendala
              WHERE id = :id";

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
    $query = "DELETE FROM " . TABLE_NAME . " WHERE id = :id";
    $stmt = $db->prepare($query);

    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);

    return $stmt->execute();
}
