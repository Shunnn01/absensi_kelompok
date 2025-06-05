

---

# 📋 Absensi Kelompok

**Absensi Kelompok** adalah aplikasi web berbasis Laravel yang digunakan untuk mencatat kehadiran anggota kelompok secara efisien. Aplikasi ini dilengkapi dengan fitur modern dan menggunakan Filament Admin Panel untuk mempermudah pengelolaan data oleh admin.

## ✨ Fitur Utama
Berikut adalah fitur-fitur yang tersedia dalam aplikasi Absensi Kelompok:

✅ 1. Autentikasi Pengguna
Login, registrasi, dan logout berbasis Laravel Auth.

Perlindungan halaman dengan middleware (auth).

Sistem peran (admin dan user) untuk membedakan hak akses.

📋 2. Manajemen Data Absensi
Pengguna dapat mencatat kehadiran (hadir/tidak hadir).

Data kehadiran disimpan secara otomatis dengan waktu dan tanggal.

Riwayat kehadiran dapat dilihat oleh masing-masing user.

🛠️ 3. Dashboard Admin 
Admin dapat melihat rekap kehadiran semua pengguna.

Fitur pencarian, penyaringan, dan pengurutan data.

Manajemen pengguna: tambah, edit, hapus akun pengguna.

📊 4. Statistik Kehadiran
Visualisasi grafik atau tabel rekap absensi.

Persentase kehadiran tiap user.

Export data kehadiran (opsional, bisa ditambahkan dengan plugin).

🔔 5. Notifikasi
Sistem pengingat untuk mengisi absensi (bisa dikembangkan lebih lanjut via email atau notifikasi sistem).

Flash messages untuk aksi berhasil/gagal (misalnya saat login atau mengisi absensi).

💼 6. Role & Permission
Admin memiliki akses penuh ke seluruh sistem.

User hanya bisa mencatat dan melihat data mereka sendiri.

Validasi akses halaman penting.



## 🛠️ Teknologi dan Versi

* **Framework**: Laravel 12.x
* **PHP**: ^8.2
* **Frontend**: TailwindCSS 4 + Vite
* **Database**: MySQL (via Laravel)
* **Package Manager**: Composer & NPM

## 🔑 Alur Akses Aplikasi
Akses Aplikasi di http://localhost:8000

Registrasi Akun baru sebagai pengguna (bisa dibatasi hanya oleh admin).

Login menggunakan email dan password yang sudah terdaftar.

Setelah login:

Pengguna biasa akan diarahkan ke halaman pengisian absensi.

Admin akan diarahkan ke dashboard admin untuk:

Mengelola pengguna (tambah/edit/hapus)

Melihat dan mengelola data absensi seluruh pengguna

Pengguna bisa melihat riwayat absensi dan status kehadiran sebelumnya.
## 🖥️ Cara Menjalankan Aplikasi

### 1. Clone Repo

```bash
git clone https://github.com/Shunnn01/absensi_kelompok.git
cd absensi_kelompok
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Setup Environment

```bash
cp .env.example .env
php artisan key:generate
```

Ubah konfigurasi `.env` sesuai kredensial database lokal Anda.

### 4. Jalankan Migrasi & Seeder (opsional)

```bash
php artisan migrate --seed
```

### 5. Jalankan Server

```bash
php artisan serve
```

### 6. Jalankan Dev Server Frontend (jika diperlukan)

```bash
npm run dev
```

## 🔑 Akses Aplikasi

* Akses via browser di: `http://localhost:8000`
* Untuk admin panel : `http://localhost:8000/admin`
* Kredensial user awal dapat ditambahkan melalui seeder atau register manual

## 🧪 Akun Demo (Seeder Default)
Admin
Email: admin@gmail.com
Password: admin123
User
(bisa langsung buat sendiri)


## 🗂️ Struktur Folder Penting

* `app/`: Logika aplikasi
* `resources/views/`: Blade views
* `routes/web.php`: Routing web
* `database/migrations/`: Struktur database
* `public/`: Aset publik dan index utama
* `config/`: Konfigurasi Laravel

## 📄 Lisensi

Proyek ini menggunakan lisensi [MIT](LICENSE).


