# IDCollabSpace

IDCollabSpace adalah platform kolaborasi proyek yang membantu developer, designer, dan creator menemukan tim, mengelola proyek, serta bekerja bersama dalam satu workspace terpadu. Aplikasi ini menyediakan fitur pencarian proyek, sistem lamaran, manajemen anggota, dan board workspace yang memudahkan koordinasi tim.

## 🚀 Fitur Utama

### 🔍 Project Discovery

* Menjelajahi proyek berdasarkan kategori, role yang dibutuhkan, dan status.
* Detail proyek lengkap: deskripsi, role yang dibutuhkan, owner, dan anggota.

### 📝 Sistem Lamaran

* User dapat melamar ke role tertentu pada sebuah proyek.
* Owner dapat menerima/menolak lamaran.
* Lamaran yang diterima otomatis menjadi anggota proyek.

### 👥 Manajemen Anggota

* Owner dapat melihat dan mengelola anggota proyek.
* Setiap anggota terhubung pada role tertentu di proyek.

### 📂 Manajemen Lamaran

* Owner dapat melihat dan mengelola lamaran dari proyek yang dibuat.
* Talent dapat melihat lamaran dari proyek yang dia lamar.

### 🗂️ Workspace Proyek

* Board kanban: **Todo**, **In Progress**, **Done**.
* Tambah task, ubah status, hapus task.
* Fitur komentar untuk diskusi internal tim.

### 🧩 Role & Skill System

* User dapat memilih role seperti UI/UX Designer, Frontend Dev, Backend Dev, dll.
* Relasi many-to-many untuk role user.

### 🔐 Keamanan & Akses

* Hanya owner dan anggota proyek yang memiliki akses ke workspace.
* Validasi dan authorization diterapkan pada setiap aksi.

## 🛠️ Teknologi yang Digunakan

### Backend

* Laravel

### Frontend

* TailwindCSS
* Flowbite
* JavaScript

### Fullstack Integration

* Livewire
* Alpine.js
* ApexCharts

### Database

* MySQL

### Tools Pendukung

* GitHub
* Laragon

## 📦 Cara Instalasi

1. Clone repository:

```bash
git clone https://github.com/alwisteins/idcollabspace.git
cd idcollabspace
```

2. Install dependency backend:

```bash
composer install
```

3. Install dependency frontend:

```bash
npm install
```

4. Copy file environment:

```bash
cp .env.example .env
```

5. Generate APP_KEY:

```bash
php artisan key:generate
```

6. Konfigurasi database di file `.env`:

```
DB_DATABASE=idcollabspace
DB_USERNAME=root
DB_PASSWORD=
```

7. Migrasi dan seed database:

```bash
php artisan migrate --seed
```

## ▶️ Cara Menjalankan Project

### Jalankan backend:

```bash
php artisan serve
```

### Jalankan frontend (Vite):

```bash
npm run dev
```

### Akses aplikasi:

```
http://localhost:8000
```
