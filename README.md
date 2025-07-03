
---

## 🔧 Backend - Laravel 10 (`/backend-kegiatan`)

### Teknologi:
- Laravel 10
- Sanctum (untuk autentikasi API)
- MySQL

### Fitur:
- Login (API Token)
- CRUD Kegiatan
- CRUD SKPD, Periode, dan Status Usulan
- Approval kegiatan
- Middleware proteksi API

### Menjalankan Backend:
```bash
cd backend-kegiatan
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve


