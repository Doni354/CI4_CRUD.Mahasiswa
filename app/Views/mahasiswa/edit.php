<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <link href="/css/style.css" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header {
            margin: 20px 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="header">
            <h1>CRUD Mahasiswa</h1>
            <p>Edit Data Mahasiswa</p>
        </div>
        <form action="/mahasiswa/update/<?= $mahasiswa['id']; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" value="<?= $mahasiswa['nim']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $mahasiswa['nama']; ?>" required>
            </div>
            <div class="form-group">
                <label for="foto_diri">Foto Diri</label>
                <input type="file" class="form-control" id="foto_diri" name="foto_diri">
                <img src="/uploads/<?= $mahasiswa['foto_diri']; ?>" width="100">
            </div>
            <div class="form-group">
                <label for="foto_ktp">Foto KTP</label>
                <input type="file" class="form-control" id="foto_ktp" name="foto_ktp">
                <img src="/uploads/<?= $mahasiswa['foto_ktp']; ?>" width="100">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/mahasiswa" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
