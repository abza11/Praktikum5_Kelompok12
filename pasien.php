<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pasien</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body> 
    <div class="container mt-5">
        <h2 class="text-center">Data Pasien</h2>
        <a href="form.php"><button class="btn btn-primary mb-1">Tambah Data</button></a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Kelurahan ID</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once 'dbkoneksi.php';
                
                $sql = "SELECT * FROM pasien";
                $rs = $dbh->query($sql);
                
                $nomor = 1;
                foreach ($rs as $row) {
                ?>
                <tr>
                    <td><?= $nomor ?></td>
                    <td><?= $row['kode'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['tmp_lahir'] ?></td>
                    <td><?= $row['tgl_lahir'] ?></td>
                    <td><?= $row['gender'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['alamat'] ?></td>
                    <td><?= $row['kelurahan_id'] ?></td>
                    <td>
                        <a class="btn btn-primary" href="view_pasien.php?id=<?= $row['id'] ?>">View</a>
                        <a class="btn btn-primary" href="form.php?idedit=<?= $row['id'] ?>">Edit</a>
                        <a class="btn btn-danger" href="delete_pasien.php?iddel=<?= $row['id'] ?>" onclick="return confirm('Anda Yakin Hapus Data Pasien <?= $row['nama'] ?>?')">Delete</a>
                    </td>
                </tr>
                <?php 
                $nomor++;
                } 
                ?>
            </tbody>
        </table>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
