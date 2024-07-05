<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
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
            <p>Manage your students' data efficiently</p>
        </div>
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#createModal">Tambah Mahasiswa</button>
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
                        <button class="btn btn-warning" data-toggle="modal" data-target="#editModal" data-id="<?= $mhs['id']; ?>" data-nim="<?= $mhs['nim']; ?>" data-nama="<?= $mhs['nama']; ?>" data-fotodiri="<?= $mhs['foto_diri']; ?>" data-fotoktp="<?= $mhs['foto_ktp']; ?>">Edit</button>
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

    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/mahasiswa/store" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" class="form-control" id="nim" name="nim" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="foto_diri">Foto Diri</label>
                            <input type="file" class="form-control" id="foto_diri" name="foto_diri" required>
                        </div>
                        <div class="form-group">
                            <label for="foto_ktp">Foto KTP</label>
                            <input type="file" class="form-control" id="foto_ktp" name="foto_ktp" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" enctype="multipart/form-data" id="editForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit_nim">NIM</label>
                            <input type="text" class="form-control" id="edit_nim" name="nim" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_nama">Nama</label>
                            <input type="text" class="form-control" id="edit_nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_foto_diri">Foto Diri</label>
                            <input type="file" class="form-control" id="edit_foto_diri" name="foto_diri">
                            <img id="edit_foto_diri_preview" width="100">
                        </div>
                        <div class="form-group">
                            <label for="edit_foto_ktp">Foto KTP</label>
                            <input type="file" class="form-control" id="edit_foto_ktp" name="foto_ktp">
                            <img id="edit_foto_ktp_preview" width="100">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $('#editModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id');
            var nim = button.data('nim');
            var nama = button.data('nama');
            var fotodiri = button.data('fotodiri');
            var fotoktp = button.data('fotoktp');

            var modal = $(this);
            modal.find('#edit_nim').val(nim);
            modal.find('#edit_nama').val(nama);
            modal.find('#edit_foto_diri_preview').attr('src', '/uploads/' + fotodiri);
            modal.find('#edit_foto_ktp_preview').attr('src', '/uploads/' + fotoktp);
            modal.find('form').attr('action', '/mahasiswa/update/' + id);
        });
    </script>
</body>
</html>
