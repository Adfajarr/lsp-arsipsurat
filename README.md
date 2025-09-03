# 📂 Sistem Informasi Pengarsipan Desa

## 🎯 Tujuan
Aplikasi ini dibuat untuk membantu proses pengarsipan surat di Desa Karangduren agar lebih **terstruktur, aman, dan mudah diakses**.  
Dengan sistem ini, surat masuk maupun keluar dapat dikelola dengan baik melalui fitur kategori, pencarian, serta unduhan file.

---

## ✨ Fitur Utama
- ✅ **Autentikasi User** (Login & Logout)
- ✅ **Dashboard** menampilkan ringkasan arsip
- ✅ **Manajemen Surat**
  - Tambah surat dengan upload file PDF
  - Edit dan update surat
  - Hapus surat dengan konfirmasi SweetAlert
  - Download file surat
- ✅ **Kategori Surat**
  - Tambah, edit, hapus kategori surat
- ✅ **Pencarian & Pagination**
- ✅ **Tampilan Responsif dengan TailwindCSS**

---

## 🚀 Cara Menjalankan

### 1. Clone repository
git clone https://github.com/Adfajarr/lsp-arsipsurat.git
cd arsip-surat

### 2. Install Dependencies
composer install
npm install && npm run dev

### 3. Setup Environment
cp .env.example .env
php artisan key:generate

### 4. Jalankan Migration & Seeder
php artisan migrate
php artisan db:seed --class=UserSeeder
Pada file SQL dengan filename Users, itu sudah terdapat akses login :
Email: ian@mail.com
Password: 12345678

atau bisa akses ke endpoint /register untuk pembuatan account :)

### 5. Jalankan Server
composer run dev

🖼 Screenshot

Screenshoot halaman login dan register
<img width="1366" height="686" alt="image" src="https://github.com/user-attachments/assets/01e0691f-77c9-411c-8b8c-013e31438a17" />
<img width="1366" height="691" alt="image" src="https://github.com/user-attachments/assets/649d2ee2-4e51-45bf-9f33-4c030e7b7033" />

Screenshoot dari tampilan dashboard
<img width="1365" height="614" alt="image" src="https://github.com/user-attachments/assets/c558fcb7-a03b-47a2-8293-8cf841d36078" />
Screenshoot tampilan bagian surat
<img width="1366" height="606" alt="image" src="https://github.com/user-attachments/assets/73f8d808-e766-45cc-80c4-0766f2b54a3c" />
<img width="1366" height="613" alt="image" src="https://github.com/user-attachments/assets/b0a16ad2-20e3-484d-8713-790e6dff5a6a" />
<img width="1364" height="612" alt="image" src="https://github.com/user-attachments/assets/4020a0e7-9cd5-4b51-991a-756e4466f865" />
<img width="1366" height="605" alt="image" src="https://github.com/user-attachments/assets/54890f3b-04b3-4242-8812-f1d6a3cd67b8" />
<img width="1366" height="607" alt="image" src="https://github.com/user-attachments/assets/8870f505-2f5b-4e50-a4fe-ba4accafd74e" />

Screenshoot tampilan bagian kategori surat
<img width="1366" height="603" alt="image" src="https://github.com/user-attachments/assets/3179ff01-77cb-4cd5-8942-7384452a0c76" />
<img width="1365" height="608" alt="image" src="https://github.com/user-attachments/assets/7ad7bf46-7162-4ff0-a347-51fb197e09b3" />
<img width="1366" height="605" alt="image" src="https://github.com/user-attachments/assets/ad65e48d-f605-4185-9973-98ee1639adad" />
<img width="1366" height="613" alt="image" src="https://github.com/user-attachments/assets/52459f5d-e5dd-4606-967e-c1d0d28632f4" />

Screenshoot tampilan bagian about
<img width="1366" height="600" alt="image" src="https://github.com/user-attachments/assets/2e29620f-ecb9-418b-849e-8a50815bc963" />











