<?php
require_once 'dbkoneksi.php';

// Validasi ID yang diterima dari URL
if (isset($_GET['iddel']) && is_numeric($_GET['iddel'])) {
    $delete = $_GET['iddel'];

    // Query untuk menghapus data
    $sql = "DELETE FROM pasien WHERE id=?";
    $st = $dbh->prepare($sql);
    
    // Eksekusi query
    $st->execute([$delete]);

    // Mengecek apakah penghapusan berhasil
    if ($st->rowCount() > 0) {
        // Jika berhasil, arahkan kembali ke halaman pasien dengan status success
        header('Location: pasien.php?status=deleted');
    } else {
        // Jika tidak berhasil, arahkan dengan pesan error
        header('Location: pasien.php?status=error');
    }
    exit();
} else {
    // Jika ID tidak valid atau tidak ada, arahkan kembali ke daftar pasien
    header('Location: pasien.php?status=invalid_id');
    exit();
}
