<?php
require_once 'dbkoneksi.php';

// Pengecekan apakah id ada di URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "ID pasien tidak ditemukan!";
    exit();
}

$_id = $_GET['id'];

// Query untuk mengambil data pasien berdasarkan id
$sql = "SELECT * FROM pasien WHERE id=?";
$st = $dbh->prepare($sql);
$st->execute([$_id]);
$row = $st->fetch();

if (!$row) {
    echo "Data pasien tidak ditemukan!";
    exit();
}
?>

<table class="table table-striped">
    <tbody>
        <tr>
            <td>ID</td>
            <td><?= $row['id'] ?></td>
        </tr>
        <tr>
            <td>Kode</td>
            <td><?= $row['kode'] ?></td>
        </tr>
        <tr>
            <td>Nama Pasien</td>
            <td><?= $row['nama'] ?></td>
        </tr>
        <tr>
            <td>Tempat Lahir</td>
            <td><?= $row['tmp_lahir'] ?></td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td><?= $row['tgl_lahir'] ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td><?= $row['gender'] ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?= $row['email'] ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><?= $row['alamat'] ?></td>
        </tr>
        <tr>
            <td>Kelurahan ID</td>
            <td><?= $row['kelurahan_id'] ?></td>
        </tr>
    </tbody>
</table>
