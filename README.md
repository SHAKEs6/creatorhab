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
│   └── helpers/            # Utility Functions (session_helper.php)
│
├── public/                 # Web Root (Document Root)
│   ├── index.php           # Entry Point
│   ├── router.php          # Development Server Router
│   ├── .htaccess           # Production URL Rewriting
│   ├── assets/             # Static Files (CSS, JS, Images)
│   └── uploads/            # User Uploads (Avatars, etc.)
│
├── database.sql            # Database Schema & Sample Data
├── composer.json           # PHP Dependencies
├── render.yaml             # Render Deployment Configuration
└── README.md               # This File
```

## 🛠️ Installation & Setup

### Local Development
1. **Clone Repository**
   ```bash
   git clone <your-repo-url>
   cd creator_platform
   ```

2. **Database Setup**
   ```bash
   # Create MySQL database
   mysql -u root -p
   CREATE DATABASE creator_platform;
   \. database.sql
   ```

3. **Environment Configuration**
   - Copy `app/config/config.php` and update database credentials
   - Update `MPESA_CONSUMER_KEY` and `MPESA_CONSUMER_SECRET` for payments

4. **Start Development Server**
   ```bash
   php -S localhost:8080 -t public public/router.php
   ```
   Visit: http://localhost:8080

### Production Deployment (Render)

1. **Push to GitHub**
   ```bash
   git add .
   git commit -m "Ready for deployment"
   git push origin main
   ```

2. **Deploy on Render**
   - Go to [render.com](https://render.com) and sign up/login
   - Click "New +" → "Web Service"
   - Connect your GitHub repository
   - Configure service:
     - **Name**: creatorhub
     - **Runtime**: PHP
     - **Build Command**: `composer install --no-dev`
     - **Start Command**: `php -S 0.0.0.0:$PORT -t public public/index.php`

3. **Database Setup**
   - Use a MySQL-compatible service (PlanetScale, Railway, or AWS RDS)
   - Set environment variables in Render dashboard:
     ```
     DB_HOST=your-db-host
     DB_USER=your-db-user
     DB_PASS=your-db-password
     DB_NAME=your-db-name
     URLROOT=https://your-app-name.onrender.com
     MPESA_CONSUMER_KEY=your-mpesa-key
     MPESA_CONSUMER_SECRET=your-mpesa-secret
     ```

4. **Run Database Migrations**
   - Access your Render service shell
   - Run: `php -r "require 'app/bootstrap.php'; /* run database setup */"`

## 🔑 Features

### Core Platform
- ✅ **User Authentication** (Register/Login/Logout)
- ✅ **Role-Based Access** (User/Admin/Super Admin)
- ✅ **Dashboard** (Profile Management, Activity Feed)
- ✅ **Responsive Design** (Mobile-First, Dark Mode)

### Marketplace
- ✅ **Channel Listings** (Buy/Sell YouTube Channels)
- ✅ **Product Catalog** (Digital Products, Tools)
- ✅ **Secure Payments** (M-Pesa Integration)

### Learning Platform
- ✅ **Course Management** (Create/View Courses)
- ✅ **Video Content** (YouTube Integration)
- ✅ **Progress Tracking** (Enrollment System)

### Community
- ✅ **Discussion Forums** (Posts, Comments)
- ✅ **Real-time Notifications** (Web Push, Email)
- ✅ **User Interactions** (Likes, Shares)

### Admin Panel
- ✅ **User Management** (CRUD Operations)
- ✅ **Content Moderation** (Approve/Reject)
- ✅ **Analytics Dashboard** (Platform Metrics)

## 🔒 Security Features
- **Password Hashing**: bcrypt with salt
- **SQL Injection Protection**: PDO Prepared Statements
- **XSS Protection**: Input Sanitization
- **CSRF Protection**: Token Validation
- **Session Security**: Secure Session Handling

## 📊 Database Schema
- **Users**: Authentication & profiles
- **Channels**: Marketplace listings
- **Courses**: Learning content
- **Enrollments**: User progress
- **Transactions**: Payment records
- **Posts**: Community content
- **Notifications**: User alerts

## 🤝 Contributing
1. Fork the repository
2. Create feature branch (`git checkout -b feature/amazing-feature`)
3. Commit changes (`git commit -m 'Add amazing feature'`)
4. Push to branch (`git push origin feature/amazing-feature`)
5. Open Pull Request

## 📄 License
This project is licensed under the MIT License - see the LICENSE file for details.

## 📞 Support
For support, email [your-email] or join our Discord community.

---

**Built with ❤️ for YouTube Creators**
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
