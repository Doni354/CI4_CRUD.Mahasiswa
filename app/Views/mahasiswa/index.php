<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">
    <style>
        .header {
            margin: 20px 0;
            text-align: center;
        }
        .table img {
            width: 100px;
            height: auto;
            cursor: pointer; /* Menambahkan cursor pointer saat gambar di-hover */
        }
        .modal-img {
            max-width: 100%;
            height: auto;
            margin: auto;
            display: block;
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
                    <td><img src="/uploads/<?= $mhs['foto_diri']; ?>" class="img-thumbnail" data-toggle="modal" data-target="#viewImageModal" data-src="/uploads/<?= $mhs['foto_diri']; ?>"></td>
                    <td><img src="/uploads/<?= $mhs['foto_ktp']; ?>" class="img-thumbnail" data-toggle="modal" data-target="#viewImageModal" data-src="/uploads/<?= $mhs['foto_ktp']; ?>"></td>
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
                <form id="createForm" action="/mahasiswa/store" method="post" enctype="multipart/form-data">
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
                            <input type="file" class="form-control-file" id="foto_diri" name="foto_diri" required>
                            <img id="foto_diri_preview" class="img-fluid mt-2">
                        </div>
                        <div class="form-group">
                            <label for="foto_ktp">Foto KTP</label>
                            <input type="file" class="form-control-file" id="foto_ktp" name="foto_ktp" required>
                            <img id="foto_ktp_preview" class="img-fluid mt-2">
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
                <form id="editForm" action="" method="post" enctype="multipart/form-data">
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
                            <input type="file" class="form-control-file" id="edit_foto_diri" name="foto_diri">
                            <img id="edit_foto_diri_preview" class="img-fluid mt-2">
                        </div>
                        <div class="form-group">
                            <label for="edit_foto_ktp">Foto KTP</label>
                            <input type="file" class="form-control-file" id="edit_foto_ktp" name="foto_ktp">
                            <img id="edit_foto_ktp_preview" class="img-fluid mt-2">
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

    <!-- View Image Modal -->
    <div class="modal fade" id="viewImageModal" tabindex="-1" aria-labelledby="viewImageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"> <!-- modal-lg untuk modal lebih besar -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewImageModalLabel">Lihat Gambar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="modalImage" class="modal-img">
                </div>
            </div>
        </div>
    </div>

    <!-- Crop Image Modal -->
    <div class="modal fade" id="cropImageModal" tabindex="-1" aria-labelledby="cropImageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"> <!-- modal-lg untuk modal lebih besar -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cropImageModalLabel">Crop Gambar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <img id="cropperImage" class="img-fluid">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="cropButton">Crop & Save</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <script>
        $(document).ready(function() {
            var cropper;
            var cropperModal = $('#cropImageModal');
            var cropperImage = document.getElementById('cropperImage');
            var inputElement;

            function readFile(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        cropperImage.src = e.target.result;
                        cropperModal.modal('show');
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            function updateInput(dataUrl) {
                var blob = dataURLtoBlob(dataUrl);
                var file = new File([blob], "cropped.jpg", { type: "image/jpeg" });
                var container = new DataTransfer();
                container.items.add(file);
                inputElement.files = container.files;
            }

            function dataURLtoBlob(dataUrl) {
                var arr = dataUrl.split(','), mime = arr[0].match(/:(.*?);/)[1], bstr = atob(arr[1]), n = bstr.length, u8arr = new Uint8Array(n);
                while(n--){
                    u8arr[n] = bstr.charCodeAt(n);
                }
                return new Blob([u8arr], {type:mime});
            }

            $('#createForm input[type="file"], #editForm input[type="file"]').on('change', function() {
                inputElement = this;
                readFile(this);
            });

            cropperModal.on('shown.bs.modal', function () {
                cropper = new Cropper(cropperImage, {
                    aspectRatio: 1,
                    viewMode: 1
                });
            }).on('hidden.bs.modal', function () {
                cropper.destroy();
                cropper = null;
            });

            $('#cropButton').on('click', function() {
                var canvas = cropper.getCroppedCanvas();
                var dataUrl = canvas.toDataURL('image/jpeg');
                updateInput(dataUrl);
                cropperModal.modal('hide');
            });

            $('.img-thumbnail').on('click', function() {
                var src = $(this).data('src');
                $('#modalImage').attr('src', src);
                $('#viewImageModal').modal('show');
            });

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
        });
    </script>
</body>
</html>
