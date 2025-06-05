

---

# 📋 Absensi Kelompok

**Absensi Kelompok** adalah aplikasi web berbasis Laravel yang digunakan untuk mencatat kehadiran anggota kelompok secara efisien. Aplikasi ini dilengkapi dengan fitur modern dan menggunakan Filament Admin Panel untuk mempermudah pengelolaan data oleh admin.

## ✨ Fitur Utama

* 🧑‍💼 Login dan autentikasi pengguna
* 📅 Pencatatan dan pemantauan kehadiran anggota
* 📊 Dashboard admin menggunakan Filament v3
* 📁 Laporan dan data absensi
* ⚙️ Pengaturan pengguna & peran (admin/user)
* 💡 Tampilan modern dengan TailwindCSS

## 🛠️ Teknologi dan Versi

* **Framework**: Laravel 12.x
* **PHP**: ^8.2
* **Admin Panel**: Filament v3.3
* **Frontend**: TailwindCSS 4 + Vite
* **Database**: MySQL (via Laravel)
* **Package Manager**: Composer & NPM

## 🧭 Alur Penggunaan

1. Admin login dan mengelola data pengguna serta absensi.
2. User login dan mencatat kehadiran sesuai jadwal.
3. Admin memonitor laporan melalui dashboard Filament.

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
* Untuk admin panel Filament: `http://localhost:8000/admin`
* Kredensial user awal dapat ditambahkan melalui seeder atau register manual

## 🗂️ Struktur Folder Penting

* `app/`: Logika aplikasi
* `resources/views/`: Blade views
* `routes/web.php`: Routing web
* `database/migrations/`: Struktur database
* `public/`: Aset publik dan index utama
* `config/`: Konfigurasi Laravel

## 📄 Lisensi

Proyek ini menggunakan lisensi [MIT](LICENSE).


