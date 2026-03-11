# CreatorHub - Netflix-Tier YouTube Creator Platform

This is the fully-featured, ultra-premium web platform for YouTube creators built on a custom PHP MVC architecture and MySQL. It combines online learning, a channel marketplace, AI creator tools, and community forums into a single SaaS application.

## 🚀 Technology Stack
- **Frontend**: HTML5, Vanilla CSS (Netflix-tier Dark Mode, Glassmorphism), ES6 JavaScript
- **Backend**: Custom PHP 8+ MVC Architecture (Object-Oriented, PDO)
- **Database**: MySQL / MariaDB (Normalized, Relational)
- **Security**: bcrypt password hashing, PDO Prepared Statements, Session-based Auth

## 📂 Folder Structure
```
creator_platform/
│
├── app/                    # Backend MVC Core
│   ├── config/             # Database & URL configs (config.php)
│   ├── controllers/        # Route Handlers (e.g., AuthController.php)
│   ├── core/               # Routing Engine (App.php, Controller.php, Database.php)
│   ├── models/             # Database Queries (e.g., User.php)
│   ├── views/              # Frontend Templates (e.g., home/index.php)
│   └── bootstrap.php       # Autoloader
│
├── public/                 # Front-facing document root
│   ├── assets/             # Images, Videos, Fonts
│   ├── script.js           # Interactive UI logic
│   ├── styles.css          # Core Styling System
│   ├── index.php           # Entry router point
│   └── .htaccess           # Apache rewrite rules
│
├── database.sql            # MySQL Initialization script
└── README.md               # This file
```

## ⚙️ Installation & Environment Setup

### Prerequisites
- A local server environment such as **XAMPP**, **WAMP**, **MAMP**, or a **LAMP stack**.
- PHP 8.0 or higher
- MySQL or MariaDB

### 1. Database Setup
1. Open phpMyAdmin (usually `http://localhost/phpmyadmin`) or your MySQL client.
2. Import the `database.sql` file located in the root directory.
3. This script will automatically create the `creator_platform` database, all necessary normalized tables (users, channels, courses, bookings), and insert a default Super Admin account.

**Default Super Admin Login**:
- **Email**: `admin@creatorhub.com`
- **Password**: `password`

### 2. Configure the Application
1. Move the entire project folder into your local server's document root (e.g., `C:\xampp\htdocs\creator_platform` or `/var/www/html/creator_platform`).
2. Open `app/config/config.php` and verify the database configuration:
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root'); // Your DB username
define('DB_PASS', '');     // Your DB password
define('DB_NAME', 'creator_platform');

define('URLROOT', 'http://localhost/creator_platform/public'); // Update if your folder name is different
```

### 3. Running the Platform
Navigate to `http://localhost/creator_platform/public` in your web browser. 

Apache's `mod_rewrite` automatically routes all requests through `public/index.php` mapping to your controller and method (e.g., `/auth/login` maps to `AuthController->login()`).

## 🛡️ Security Features Integrated
- **SQL Injection Prevention**: The `Database.php` core class forces all queries through PDO Prepared Statements and value binding.
- **Passwords**: The `User.php` model leverages PHP's strong `password_hash()` (bcrypt) algorithm.
- **Access Control**: Roles (`user`, `admin`, `super_admin`) are stored in sessions via the `AuthController` upon login and can be checked across all controllers.
# CreatorHub
# CreatorHub
# CreatorHub
