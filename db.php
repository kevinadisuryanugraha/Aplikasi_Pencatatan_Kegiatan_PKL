<?php

function connect_db()
{
    $db = new SQLite3('db_pencatatan_pkl.db');
    return $db;
}

function buat_table()
{
    $db = connect_db();
    $db->exec("CREATE TABLE IF NOT EXISTS jadwal_pkl (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    tanggal TEXT NOT NULL,
    status_kehadiran TEXT NOT NULL,
    waktu_datang TEXT NOT NULL,
    waktu_pulang TEXT NOT NULL,
    nama_pekerjaan TEXT NOT NULL,
    mulai_pekerjaan TEXT NOT NULL,
    selesai_pekerjaan TEXT NOT NULL,
    uraian_pekerjaan TEXT NOT NULL,
    kendala TEXT NOT NULL
    )");
}

buat_table();
