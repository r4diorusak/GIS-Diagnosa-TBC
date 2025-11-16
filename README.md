# GIS Diagnosa TBC

Aplikasi sistem informasi geografis untuk diagnosa tuberkulosis (TBC) berbasis web.

## Deskripsi

Proyek ini adalah aplikasi web yang menggabungkan Geographic Information System (GIS) dengan sistem diagnosa penyakit tuberkulosis. Aplikasi ini membantu dalam pemetaan dan analisis data pasien TBC secara geografis.

## Teknologi

- **Framework**: CodeIgniter 3.x
- **Backend**: PHP
- **Frontend**: HTML, CSS, JavaScript (jQuery)
- **Database**: MySQL/MariaDB
- **GIS Library**: Google Maps
- **Bootstrap**: Bootstrap 3

## Fitur

- Manajemen data pasien TBC
- Manajemen data fasilitas kesehatan (fasyankes)
- Diagnosa berbasis gejala dengan metode Bayes
- Visualisasi data geografis menggunakan Google Maps
- Panel administrasi untuk pengelolaan data
- Hitung probabilitas menggunakan metode Bayes
- Data export dan laporan

## Struktur Proyek

```
GIS-Diagnosa-TBC/
├── application/          # Folder aplikasi CodeIgniter
│   ├── config/          # Konfigurasi aplikasi
│   ├── controllers/     # Controller (Admin, User, Welcome)
│   ├── models/          # Model data
│   ├── views/           # View/Template
│   ├── libraries/       # Library kustom (Googlemaps, Jsmin)
│   ├── helpers/         # Helper functions
│   └── ...
├── system/              # Folder core CodeIgniter
├── public/              # Folder public (CSS, JS, Bootstrap, Font Awesome)
├── DB-SCHEMA.sql        # Schema database
├── gis.sql              # Data SQL
└── index.php            # Entry point aplikasi
```

## Instalasi

1. **Clone repository**
   ```bash
   git clone https://github.com/r4diorusak/GIS-Diagnosa-TBC.git
   ```

2. **Konfigurasi Database**
   - Buka file `application/config/database.php`
   - Sesuaikan konfigurasi database (hostname, username, password, database)
   - Import schema: `DB-SCHEMA.sql` dan `gis.sql`

3. **Konfigurasi Base URL**
   - Edit file `application/config/config.php`
   - Ubah `$config['base_url']` sesuai URL aplikasi Anda

4. **Server Requirements**
   - PHP 5.6+
   - MySQL 5.6+
   - Web Server (Apache dengan mod_rewrite)

## Penggunaan

### Login
Akses aplikasi melalui browser:
```
http://localhost/gis/
```

### Fitur Admin
- Kelola data pasien
- Kelola data fasilitas kesehatan
- Lihat peta geografis fasilitas
- Analisis data dengan metode Bayes

### Fitur User
- Diagnosa gejala TBC
- Lihat riwayat diagnosa
- Akses informasi geografis

## Controller Utama

- **Welcome** - Halaman utama
- **Admin** - Panel administrasi
- **User** - Interface pengguna

## Model

- **Madmin** - Model untuk data administrasi

## Library Kustom

- **Googlemaps** - Integrasi Google Maps
- **Jsmin** - Minifikasi JavaScript

## Helper

- **menus_helper** - Helper untuk menu navigasi

## Database

Tabel-tabel utama dapat dilihat di file `DB-SCHEMA.sql` dan `gis.sql`

## Lisensi

MIT License - Lihat dokumentasi CodeIgniter untuk detail lebih lanjut.

## Penulis & Kredit

- **Khairul Adha**
  - Email: r4dioz.88@gmail.com
  - Website: www.rainbowcodec.com
  - GitHub: r4diorusak

## Kontribusi

Silakan buat pull request untuk kontribusi.

---

**Catatan**: Pastikan konfigurasi environment dan database sudah sesuai sebelum menjalankan aplikasi.
