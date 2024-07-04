Berikut adalah contoh README file untuk repositori GitHub dengan project CRUD tabel mahasiswa menggunakan CodeIgniter 4:

---

# CI4_CRUD

Sebuah project sederhana untuk manajemen CRUD (Create, Read, Update, Delete) tabel mahasiswa menggunakan CodeIgniter 4.

## Fitur

- Menambahkan data mahasiswa
- Melihat daftar mahasiswa
- Mengedit data mahasiswa
- Menghapus data mahasiswa

## Prasyarat

Pastikan Anda telah menginstal software berikut:

- PHP versi 7.4 ke atas
- Composer
- Web server seperti Apache atau Nginx
- Database MySQL/MariaDB

## Instalasi

Ikuti langkah-langkah di bawah ini untuk menginstal dan menjalankan project ini secara lokal:

1. **Clone repositori ini**

   ```bash
   git clone https://github.com/username/CI4_CRUD.git
   cd CI4_CRUD
   ```

2. **Instal dependensi dengan Composer**

   ```bash
   composer install
   ```

3. **Salin file `.env.example` menjadi `.env`**

   ```bash
   cp env.example .env
   ```

4. **Konfigurasi basis data**

   Edit file `.env` dan sesuaikan pengaturan database sesuai dengan konfigurasi lokal Anda:

   ```plaintext
   database.default.hostname = localhost
   database.default.database = nama_database
   database.default.username = nama_user
   database.default.password = password
   database.default.DBDriver = MySQLi
   ```

5. **Migrasi basis data**

   Jalankan perintah berikut untuk membuat tabel yang diperlukan dalam basis data:

   ```bash
   php spark migrate
   ```

6. **Jalankan server pengembangan**

   ```bash
   php spark serve
   ```

   Aplikasi akan berjalan di `http://localhost:8080`

## Penggunaan

### Menambahkan Data Mahasiswa

1. Buka aplikasi di browser: `http://localhost:8080/mahasiswa`
2. Klik tombol "Tambah Mahasiswa"
3. Isi form dengan data mahasiswa dan klik "Simpan"

### Melihat Daftar Mahasiswa

1. Buka aplikasi di browser: `http://localhost:8080/mahasiswa`
2. Daftar mahasiswa akan ditampilkan dalam tabel

### Mengedit Data Mahasiswa

1. Buka aplikasi di browser: `http://localhost:8080/mahasiswa`
2. Klik tombol "Edit" pada mahasiswa yang ingin diubah
3. Edit data mahasiswa dan klik "Simpan"

### Menghapus Data Mahasiswa

1. Buka aplikasi di browser: `http://localhost:8080/mahasiswa`
2. Klik tombol "Hapus" pada mahasiswa yang ingin dihapus

## Kontribusi

Jika Anda ingin berkontribusi pada proyek ini, silakan buat pull request atau buka issue untuk mendiskusikan perubahan yang ingin Anda lakukan.

## Lisensi

Proyek ini dilisensikan di bawah lisensi MIT. Lihat file [LICENSE](LICENSE) untuk informasi lebih lanjut.

---

Pastikan untuk mengganti `https://github.com/username/CI4_CRUD.git` dengan URL repositori GitHub Anda yang sebenarnya.