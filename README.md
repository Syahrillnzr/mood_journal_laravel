# 📓 Mood Journal — Laravel Web App

A mood journaling platform built with Laravel, allowing users to log daily emotions and track patterns over time. Admins can manage moods and monitor platform analytics. Built for simplicity, with Blade views and role-based dashboards.

---

## 🚀 Features

### 👤 User
- Register & Login (via Breeze)
- Select moods (icons/GIFs), add descriptions, highlights & photos
- View past entries
- Personal mood analytics (pie, bar, and trend charts)
- Profile page to:
  - Change avatar
  - Update email/password
  - Log out

### 🛠 Admin
- Dashboard with:
  - Total users
  - Total entries
  - Mood type count
- Manage moods (CRUD + image/GIF icons)
- View and manage users
- Global analytics across users

### 🌐 Common
- One login page, redirects based on role (`user` or `admin`)
- Blade + Alpine.js (via Laravel Breeze)
- Responsive layout
- Future support for Google login (via Laravel Socialite)

---

## 🧱 Tech Stack

| Layer        | Tech                          |
|--------------|-------------------------------|
| Framework    | Laravel 11                    |
| Frontend     | Blade, Alpine.js, Tailwind CSS |
| Auth         | Laravel Breeze                |
| Charts       | Chart.js / ApexCharts         |
| Database     | MySQL                         |
| File Uploads | Laravel Filesystem (public)   |

---

## 🛠 Installation

```bash
git clone https://github.com/yourusername/mood-journal.git
cd mood-journal

composer install
npm install && npm run dev

cp .env.example .env
php artisan key:generate

# Set your DB credentials in `.env`

php artisan migrate
php artisan db:seed
