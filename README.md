
# FE-Kehadiran

Proyek ini adalah implementasi Front-End dari sistem Monitoring Kehadiran yang dikembangkan sebagai bagian dari tugas mata kuliah Pemrograman Berbasis Framework (PBF).

## Deskripsi

FE-Kehadiran bertujuan untuk menyediakan antarmuka pengguna yang responsif dan interaktif dalam memantau kehadiran. Proyek ini dibangun menggunakan Laravel sebagai backend dan teknologi front-end yang sesuai.

## Fitur

* Autentikasi pengguna (login dan registrasi).
* Dashboard untuk menampilkan data kehadiran secara real-time.
* Fitur pencarian dan filter untuk memudahkan navigasi data.
* Input kehadiran mahasiswa oleh dosen.
* Rekap kehadiran perkuliahan.
* Export data kehadiran ke PDF.
* Desain responsif yang mendukung berbagai perangkat.

## Instalasi

Ikuti langkah-langkah berikut untuk menginstal dan menjalankan proyek ini secara lokal:

1. *Clone repository ini:*

   bash
   git clone https://github.com/naimahdamayanti/FE-Kehadiran.git
   cd FE-Kehadiran
   

2. *Instal dependensi PHP menggunakan Composer:*

   bash
   composer install
   

3. *Instal dependensi front-end menggunakan npm:*

   bash
   npm install
   

4. **Salin file .env.example menjadi .env dan sesuaikan konfigurasi environment Anda:**

   bash
   cp .env.example .env
   

5. *Jalankan server pengembangan:*

   bash
   php artisan serve
   

   Aplikasi akan tersedia di http://localhost:8000.

## Penggunaan

Setelah aplikasi berjalan, buka browser dan akses http://localhost:8000 untuk melihat antarmuka pengguna. Masukkan kredensial yang valid untuk masuk dan mulai memantau data kehadiran.