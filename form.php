<?php
require_once 'dbkoneksi.php';

if (!empty($_GET['idedit'])) {
    $edit = $_GET['idedit'];
    $sql = "SELECT * FROM pasien WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$edit]);
    $row = $st->fetch();
} else {
    $row = [];
}
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4"><?= isset($row['id']) ? 'Edit Pasien' : 'Tambah Pasien' ?></h2>
    <form action="proses_pasien.php" method="POST">
        <input type="hidden" name="idedit" value="<?= $row['id'] ?? '' ?>">

        <div class="form-group row">
            <label for="kode" class="col-4 col-form-label">Kode</label>
            <div class="col-8">
                <input id="kode" name="kode" type="text" class="form-control" value="<?= $row['kode'] ?? '' ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="nama" class="col-4 col-form-label">Nama</label>
            <div class="col-8">
                <input id="nama" name="nama" type="text" class="form-control" value="<?= $row['nama'] ?? '' ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="tmp_lahir" class="col-4 col-form-label">Tempat Lahir</label>
            <div class="col-8">
                <input id="tmp_lahir" name="tmp_lahir" type="text" class="form-control" value="<?= $row['tmp_lahir'] ?? '' ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="tgl_lahir" class="col-4 col-form-label">Tanggal Lahir</label>
            <div class="col-8">
                <input id="tgl_lahir" name="tgl_lahir" type="date" class="form-control" value="<?= $row['tgl_lahir'] ?? '' ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="gender" class="col-4 col-form-label">Jenis Kelamin</label>
            <div class="col-8">
                <select id="gender" name="gender" class="custom-select">
                    <option value="L" <?= (isset($row['gender']) && $row['gender'] == 'L') ? 'selected' : '' ?>>Laki-Laki</option>
                    <option value="P" <?= (isset($row['gender']) && $row['gender'] == 'P') ? 'selected' : '' ?>>Perempuan</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-4 col-form-label">Email</label>
            <div class="col-8">
                <input id="email" name="email" type="email" class="form-control" value="<?= $row['email'] ?? '' ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="alamat" class="col-4 col-form-label">Alamat</label>
            <div class="col-8">
                <input id="alamat" name="alamat" type="text" class="form-control" value="<?= $row['alamat'] ?? '' ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="kelurahan_id" class="col-4 col-form-label">Kelurahan ID</label>
            <div class="col-8">
                <input id="kelurahan_id" name="kelurahan_id" type="text" class="form-control" value="<?= $row['kelurahan_id'] ?? '' ?>">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary"><?= isset($row['id']) ? 'Update' : 'Simpan' ?></button>
                <a href="proses_pasien.php" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
