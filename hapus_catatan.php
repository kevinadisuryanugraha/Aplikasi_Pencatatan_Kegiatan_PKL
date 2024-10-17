<?php
require_once 'functions.php';

if (!isset($_GET['id'])) {
    echo "Catatan tidak ditemukan.";
    exit;
}

$id = $_GET['id'];

hapus_catatan($id);

header('Location: index.php');
exit;
