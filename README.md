
# Aplikasi Data Mahasiswa - Teknik Informatika UMMI

Aplikasi web sederhana untuk manajemen data mahasiswa menggunakan PHP Native dan MySQL. Proyek ini dibuat untuk memenuhi tugas pemrograman web dasar dengan fitur CRUD (Create, Read, Update, Delete) serta unggah foto profil.

## 🚀 Fitur
* **Dashboard Utama**: Menampilkan daftar mahasiswa dalam bentuk tabel yang rapi.
* **Tambah Data**: Formulir input mahasiswa baru beserta unggah foto profil.
* **Edit Data**: Memperbarui informasi mahasiswa yang sudah ada.
* **Hapus Data**: Menghapus data mahasiswa beserta file foto yang tersimpan.
* **Validasi Client-Side**: Validasi form menggunakan JavaScript (cek NIM kosong, format foto, dan ukuran file maksimal 2MB).
* **Responsive Design**: Tampilan modern menggunakan CSS dengan skema warna profesional.

## 🛠️ Teknologi yang Digunakan
* **Bahasa Pemrograman**: PHP
* **Database**: MySQL
* **Server**: Laragon atau XAMPP
* **Styling**: CSS3
* **Scripting**: JavaScript (Validasi)

## 📋 Persiapan Instalasi

### 1. Database
Pastikan MySQL sudah berjalan, lalu buat database dan tabel melalui phpMyAdmin:

```sql
CREATE DATABASE db_mahasiswa;
USE db_mahasiswa;

CREATE TABLE mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(20) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    jurusan VARCHAR(100) NOT NULL,
    foto VARCHAR(255)
);

