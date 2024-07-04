<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="/css/style.css" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header {
            margin: 20px 0;
            text-align: center;
        }
        .table img {
            width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="header">
            <h1>CRUD Mahasiswa</h1>
            <p>By Doni_354</p>
        </div>
        <a href="/mahasiswa/create" class="btn btn-primary mb-3">Tambah Mahasiswa</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Foto Diri</th>
                    <th>Foto KTP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($mahasiswa as $mhs): ?>
                <tr>
                    <td><?= $mhs['nim']; ?></td>
                    <td><?= $mhs['nama']; ?></td>
                    <td><img src="/uploads/<?= $mhs['foto_diri']; ?>"></td>
                    <td><img src="/uploads/<?= $mhs['foto_ktp']; ?>"></td>
                    <td>
                        <a href="/mahasiswa/edit/<?= $mhs['id']; ?>" class="btn btn-warning">Edit</a>
                        <form action="/mahasiswa/delete/<?= $mhs['id']; ?>" method="post" class="d-inline">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
