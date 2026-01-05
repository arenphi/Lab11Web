# Lab11Web - Framework Modular PHP OOP

### Nama : Reynaldi Nugraha Putra <br>
### NIM  : 312410278 <br>
### Kelas : TI.24.A.3 <br>
### Matakuliah : Pemrograman Web Pert 13 <br>
#

## 🚀 Fitur Utama

* **Modular Architecture**: Pemisahan modul berdasarkan fitur (Modul User).
* **Object-Oriented Programming (OOP)**: Menggunakan Class `Database` untuk query dan Class `Form` untuk pembuatan form otomatis.
* **Clean URL / Routing**: Implementasi sistem routing menggunakan `PATH_INFO` dan konfigurasi `.htaccess`.
* **CRUD Operations**: Implementasi lengkap Tambah, Tampil, Ubah, dan Hapus pada tabel database.

## 📁 Struktur Folder

```text
lab11_php_oop/
├── .htaccess=
├── config.php
├── index.php
├── class/
│   ├── Database.php
│   └── Form.php
├── module/
│   └── user/
│       ├── index.php
│       ├── tambah.php
│       └── ubah.php
└── template/
    ├── header.php
    ├── footer.php
    └── sidebar.php

```

## 🛠️ Langkah Instalasi

1. **Clone Repositori**:
```bash
git clone https://github.com/username/Lab11Web.git

```


2. **Konfigurasi Database**:
* Buat database bernama `latihan_oop`.
* Impor tabel melalui perintah SQL berikut:


```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    email VARCHAR(100),
    pass VARCHAR(100),
    jenis_kelamin ENUM('L','P'),
    agama VARCHAR(20),
    hobi VARCHAR(255),
    alamat TEXT
);

```


3. **Sesuaikan `config.php**`:
Pastikan *username* dan *password* MySQL Anda sudah benar.
4. **Akses Browser**:
Buka `http://localhost/lab11_php_oop/`.

## 📝 Hasil Praktikum

### 1. Sistem Routing

Aplikasi menggunakan `index.php` sebagai *front controller*. URL yang diakses akan diparsing untuk menentukan modul dan halaman mana yang akan dimuat.

* Contoh: `user/tambah` akan memuat file di `module/user/tambah.php`.

### 2. Implementasi OOP

* **Class Database**: Menangani koneksi mysqli, query SELECT, INSERT, UPDATE, dan DELETE secara efisien.
* **Class Form**: Menghasilkan elemen HTML form secara dinamis melalui method `addField()`.

### 3. Tampilan Antarmuka

Tabel data pengguna telah dilengkapi dengan **CSS Modern** yang mencakup:

* *Hover effect* pada baris tabel.
* Desain tombol aksi (Ubah & Hapus) yang intuitif.
* Layout responsif menggunakan Sidebar dan Header.

## 🎓 Kesimpulan

Melalui praktikum ini, mahasiswa berhasil memahami cara kerja framework modern yang memisahkan antara **Logika (Class)**, **Kontrol (Routing)**, dan **Tampilan (Template)**. Sistem ini memudahkan pengembangan aplikasi skala besar karena kode lebih terorganisir dan mudah dikelola (*maintainable*).
