-- Creator Platform Database Schema
-- Run this script in phpMyAdmin or via MySQL command line

CREATE DATABASE IF NOT EXISTS creator_platform;
USE creator_platform;

-- Users Table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin', 'super_admin') DEFAULT 'user',
    avatar VARCHAR(255) DEFAULT 'default.png',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Channels Marketplace
CREATE TABLE IF NOT EXISTS channels (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    niche VARCHAR(100) NOT NULL,
    subscribers INT DEFAULT 0,
    watch_hours INT DEFAULT 0,
    revenue DECIMAL(10,2) DEFAULT 0.00,
    price DECIMAL(10,2) NOT NULL,
    description TEXT,
    status ENUM('pending', 'approved', 'sold') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Courses
CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    thumbnail VARCHAR(255),
    duration_hours DECIMAL(4,1) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Course Enrollments
CREATE TABLE IF NOT EXISTS enrollments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    course_id INT NOT NULL,
    progress INT DEFAULT 0,
    enrolled_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
);

-- Consultations
CREATE TABLE IF NOT EXISTS consultations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    duration_minutes INT NOT NULL,
    price DECIMAL(10,2) NOT NULL
);

-- Bookings
CREATE TABLE IF NOT EXISTS bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    consultation_id INT NOT NULL,
    booking_date DATETIME NOT NULL,
    meeting_link VARCHAR(255),
    status ENUM('pending', 'confirmed', 'completed', 'cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (consultation_id) REFERENCES consultations(id) ON DELETE CASCADE
);

-- Insert Super Admin & Admin Roles
INSERT INTO users (name, email, password_hash, role) VALUES 
('Shakes', 'shakesian6@gmail.com', '$2y$12$2It9GkMrQJZk29sgCho13.YqzWzqlRuFEHF.km.HPvqjsgFlMR1oS', 'super_admin'),
('Platform Admin', 'admin@creatorhub.com', '$2y$12$2It9GkMrQJZk29sgCho13.YqzWzqlRuFEHF.km.HPvqjsgFlMR1oS', 'admin');
-- Note: Default password for both is 'admin@1234'

-- Insert Default Courses
INSERT INTO courses (title, description, price, thumbnail, duration_hours) VALUES 
('YouTube for Beginners', 'The ultimate 101 guide to launching your first channel correctly.', 49.00, 'th-1.jpg', 2.5),
('Get 1,000 Subs Fast', 'Actionable, proven strategies to hit the 1K milestone.', 99.00, 'th-2.jpg', 5.0),
('YT Automation Masterclass', 'Build cash-cow faceless channels and automate the entire process.', 199.00, 'th-3.jpg', 12.0),
('Viral Shorts Strategy', 'Dominate YouTube Shorts and gain explosive growth.', 79.00, 'th-4.jpg', 3.0);

-- Insert Default Consultations
INSERT INTO consultations (title, duration_minutes, price) VALUES 
('30 Minute Strategy Call', 30, 99.00),
('1 Hour Deep Dive', 60, 150.00);
