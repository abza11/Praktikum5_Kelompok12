<?php
require_once 'dbkoneksi.php';

// Menangkap data dari form
$_kode = $_POST['kode'] ?? '';
$_nama = $_POST['nama'] ?? '';
$_tmp_lahir = $_POST['tmp_lahir'] ?? '';
$_tgl_lahir = $_POST['tgl_lahir'] ?? '';
$_gender = $_POST['gender'] ?? '';
$_email = $_POST['email'] ?? '';
$_alamat = $_POST['alamat'] ?? '';
$_kelurahan_id = $_POST['kelurahan_id'] ?? '';
$_idedit = $_POST['idedit'] ?? '';

// Siapkan array data
$ar_data = [$_kode, $_nama, $_tmp_lahir, $_tgl_lahir, $_gender, $_email, $_alamat, $_kelurahan_id];

// Cek apakah ini insert atau update
if (empty($_idedit)) {
    // INSERT
    $sql = "INSERT INTO pasien (kode, nama, tmp_lahir, tgl_lahir, gender, email, alamat, kelurahan_id) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
} else {
    // UPDATE
    $ar_data[] = $_idedit; // untuk WHERE id=?
    $sql = "UPDATE pasien SET kode=?, nama=?, tmp_lahir=?, tgl_lahir=?, gender=?, email=?, alamat=?, kelurahan_id=? 
            WHERE id=?";
}

// Eksekusi query
$st = $dbh->prepare($sql);
$st->execute($ar_data);

// Redirect ke halaman daftar pasien
header("Location: pasien.php?status=success");
exit();
?>
