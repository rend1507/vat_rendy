# Panduan Penggunaan Aplikasi

## Informasi Aplikasi

Aplikasi ini adalah sistem manajemen kendaraan yang dibangun menggunakan framework CodeIgniter 4. Aplikasi ini dirancang untuk membantu pengguna dalam mengelola data kendaraan.

### Versi Aplikasi

- **Framework**: CodeIgniter 4
- **Versi PHP**: 7.4 atau lebih baru
- **Versi Database**: MySQL 5.7 atau lebih baru

## Daftar Username dan Password

Berikut adalah daftar username dan password default untuk mengakses aplikasi:

| Username   | Password     | Peran       |
|------------|--------------|-------------|
| admin1     | admin1123    | Admin       |
| admin2     | admin2123    | Admin       |
| approver1  | approver1123 | Approver    |
| approver2  | approver2123 | Approver    |
| approver3  | approver3123 | Approver    |
| approver4  | approver4123 | Approver    |

**Catatan:** Demi keamanan, disarankan untuk segera mengganti password setelah login pertama kali.

## Persyaratan Sistem

- **Web Server**: Apache atau Nginx
- **PHP**: Versi 7.4 atau lebih baru
- **Database**: MySQL 5.7 atau lebih baru
- **Composer**: Untuk mengelola dependensi PHP

## Panduan Instalasi

Berikut adalah langkah-langkah untuk menginstal aplikasi ini:

### 1. Clone Repository

Clone repository ini ke direktori lokal Anda:

```bash
git clone https://github.com/username/repo.git
```

### 2. Instal Dependensi

Masuk ke direktori aplikasi dan jalankan perintah berikut untuk menginstal semua dependensi yang diperlukan:

```bash
cd repo
composer install
```

### 3. Konfigurasi Environment

Salin file `.env.example` menjadi `.env` dan sesuaikan pengaturan database Anda:

```bash
cp .env.example .env
```

Edit file `.env` dan sesuaikan bagian berikut:

```bash
database.default.hostname = 127.0.0.1
database.default.database = vat
database.default.username = (username_database_anda)
database.default.password = (password_database_anda)
database.default.DBDriver = MySQLi
```

### 4. Migrasi dan Seed Database

Jalankan migrasi database untuk membuat tabel-tabel yang diperlukan:

```bash
php spark migrate
```

Kemudian, jalankan seeder untuk mengisi data awal:

```bash
php spark db:seed DatabaseSeeder
```

### 5. Menjalankan Server

Jalankan server pengembangan bawaan CodeIgniter:

```bash
php spark serve
```

Aplikasi akan dapat diakses di `http://localhost:8080`.

## Panduan Penggunaan

### 1. Login

Buka browser Anda dan akses URL `http://localhost:8080`. Gunakan username dan password yang terdaftar untuk login.

### A1. Manajemen Reservasi (Admin)

Setelah login sebagai admin, Anda dapat mulai mengelola data reservasi:

- **Tambah Reservasi**: Klik pada menu "Beranda" dan klik pada tombol "Tambah Reservasi +", isi formulir yang disediakan.
- **Hapus Reservasi**: Klik pada menu "Beranda" dan lihat pada tabel reservasi (jika ada), klik pada tombol "Batalkan" pada baris yang ingin dihapus reservasinya.

### A2. Mengelola Kendaraan (Admin)

Setelah login sebagai admin, Anda dapat mulai mengelola data kendaraan:

- **Daftar Kendaraan**: Klik pada menu "Kendaraan" dan pilih sub-menu "Daftar Kendaraan" untuk melihat semua data kendaraan yang telah ditambahkan.
- **Edit Kendaraan**: Klik pada menu "Kendaraan" dan pilih sub-menu "Daftar Kendaraan", lalu pilih tombol "Edit" pada baris pada tabel kendaraan yang mau diedit.
- **Edit Kendaraan**: Klik pada menu "Kendaraan" dan pilih sub-menu "Daftar Kendaraan", lalu pilih tombol "Hapus" pada baris pada tabel kendaraan yang mau diedit. tersebut.
- **Tambah Kendaraan**: Klik pada menu "Kendaraan" dan pilih sub-menu "Tambah Kendaraan" dan isi formulir yang disediakan.
-

### B1. Approve dan Reject Reservasi (Approval)

Setelah login sebagai Approvers, Anda dapat mulai mengelola data reservasi pending:

- **Approve dan Reject Reservasi**: Klik pada menu "Beranda" dan lihat pada tabel reservasi (jika ada), klik pada tombol "Approve" atau "Reject" pada baris yang ingin diubah statusnya.
- **Daftar Approvals**: Klik pada menu "Daftar Approvals" dan lihat pada tabel reservasi (jika ada), klik pada tombol "Approve" atau "Reject" pada baris yang ingin diubah statusnya.

## Kontak

Untuk informasi lebih lanjut, silakan hubungi saya di [rendyyofanakusuma@gmail.com](mailto:email@example.com).
Atau WhatsApp saya di [081233069610](https://wa.me/6281233069610)
