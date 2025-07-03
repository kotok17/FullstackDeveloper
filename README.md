🛠️ Teknologi
Backend: Laravel 10 (REST API)

Frontend: React (Vite / CRA)

Database: MySQL

Auth: Sanctum Token

Clone reposiroty :
git clone https://github.com/username/nama-project.git
cd nama-project

🖥️ 2. Jalankan Laravel Backend
bash
Copy
Edit
cd backend  # masuk folder backend Laravel
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate --seed
php artisan serve

🔑 Note: Jangan lupa setup .env MySQL dengan benar:

makefile
Copy
Edit
DB_DATABASE=pusdatin
DB_USERNAME=root
DB_PASSWORD=

cd frontend  # masuk folder frontend React
npm install
npm start
🔐 4. Login
Untuk login, gunakan endpoint:

nginx
Copy
Edit
POST http://127.0.0.1:8000/api/login
Body:

json
Copy
Edit
{
  "email": "bappeda@bappeda.go.id",
  "password": "password"
}
