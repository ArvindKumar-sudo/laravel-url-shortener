# Laravel URL Shortener (Multi-Tenant)

## 🚀 Project Overview
This is a Laravel-based URL shortener system with role-based access control and company-based isolation.

---

## 👤 Roles & Permissions

### 👑 SuperAdmin
- Cannot create short URLs
- Can view all URLs across companies
- Can create new companies and assign admins

### 🏢 Admin
- Can create short URLs
- Can view URLs within their company only

### 👤 Member
- Can create short URLs
- Can view only URLs created by themselves

---

## 🔗 URL Rules
- Short URLs are **NOT publicly accessible**
- Only authenticated users can access short URLs
- Redirects to original URL
- Tracks number of hits per URL

---

## 🛠 Tech Stack
- Laravel 12
- MySQL
- Blade (UI)
- Tailwind CSS

---

## ⚙️ Setup Instructions

### 1. Clone Repository
```bash
git clone https://github.com/ArvindKumar-sudo/laravel-url-shortener.git
cd laravel-url-shortener

2. Install Dependencies
    composer install
3. Setup Environment
    cp .env.example .env
    php artisan key:generate
4. Configure Database
    Edit .env file:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=root
    DB_PASSWORD=
5. Run Migrations & Seeders
    php artisan db:seed --class=RoleSeeder 
6. Run Server
    php artisan serve


Default Login Credentials
👑 SuperAdmin
Email: super@admin.com
Password: 12345

🏢 Admin
Password: 12345

👤 Member
Password: 12345
