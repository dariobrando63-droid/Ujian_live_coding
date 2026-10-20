# Sistem Informasi Kepegawaian (SIM Pegawai)

Aplikasi Pengelolaan Data Kepegawaian dan Departemen berbasis Laravel untuk Ujian Live Coding Pemrograman Web Lanjut.

## Fitur Utama
1. **Authentication:** Login langsung tanpa password dan Logout (Protected Routes).
2. **Database Relasional:** Relasi One-to-Many antara tabel `departments` dan `employees`.
3. **CRUD Departemen:** Proteksi integritas penghapusan departemen yang masih memiliki pegawai.
4. **CRUD Pegawai:** Validasi input (gaji > 0, tanggal valid, foreign key dipastikan ada).

## Informasi Akun Login
- **Email:** `admin@hrd.com`

## Cara Instalasi & Menjalankan Proyek

```bash
# 1. Clone repository
git clone <LINK_REPOSITORY_GITHUB_KAMU>
cd sim-pegawai

# 2. Install dependensi
composer install

# 3. Konfigurasi Environment (.env)
cp .env.example .env
php artisan key:generate

# 4. Jalankan Migration & Seeder
php artisan migrate:fresh --seed

# 5. Jalankan Server
php artisan serve