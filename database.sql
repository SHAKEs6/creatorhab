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

-- Guides Table
CREATE TABLE IF NOT EXISTS guides (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    content LONGTEXT NOT NULL,
    category VARCHAR(100) NOT NULL,
    thumbnail VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Videos Table (YouTube Embedding)
CREATE TABLE IF NOT EXISTS videos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    youtube_id VARCHAR(50) NOT NULL,
    category VARCHAR(100),
    is_trending BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Resources Table
CREATE TABLE IF NOT EXISTS resources (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    category VARCHAR(100),
    rating INT DEFAULT 0,
    likes INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Posts Table (News/Updates)
CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    image VARCHAR(255),
    page_location ENUM('home', 'guides', 'news') DEFAULT 'home',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Marketplace Table (Products)
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    category VARCHAR(100),
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Course Videos (Many-to-Many Relationship)
CREATE TABLE IF NOT EXISTS course_videos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT NOT NULL,
    video_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE,
    FOREIGN KEY (video_id) REFERENCES videos(id) ON DELETE CASCADE
);

-- Insert Sample Data for Guides
INSERT INTO guides (title, description, content, category, thumbnail) VALUES 
('Perfect Niche Selection', 'How to find a high-CPM niche that you actually enjoy.', 'Full guide content here...', 'Setup', 'guide-1.jpg'),
('Editing for Retention', 'Master the fast-paced editing style that keeps viewers hooked.', 'Full guide content here...', 'Growth', 'guide-2.jpg');

-- Insert Sample Data for Videos
INSERT INTO videos (title, youtube_id, category, is_trending) VALUES 
('How to Grow on YouTube 2026', 'dQw4w9WgXcQ', 'Growth', TRUE),
('YouTube Automation Explained', 'jNQXAC9IVRw', 'Automation', TRUE);

-- Insert Sample Data for Resources
INSERT INTO resources (title, description, file_path, category) VALUES 
('Launch Checklist', '50-point checklist for new channels.', 'checklist.pdf', 'Strategy'),
('High-CTR Font Pack', '10 fonts that boost your CTR.', 'fonts.zip', 'Design');

-- Insert Sample Data for Posts
INSERT INTO posts (title, content, page_location) VALUES 
('Website Launch!', 'Welcome to the ultimate YouTube Creator Platform.', 'home'),
('New Kurs Released', 'Check out our new Automation masterclass.', 'home');

-- Note: Default password for both shakesian6@gmail.com and admin@creatorhub.com is 'admin@1234'
-- Already inserted super_admin and admin in previous steps.

-- Transactions/Orders
CREATE TABLE IF NOT EXISTS transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    item_name VARCHAR(255) NOT NULL,
    item_type ENUM('course', 'consultation', 'channel', 'product') NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    currency VARCHAR(3) DEFAULT 'KES',
    payment_method ENUM('mpesa', 'paypal', 'other') DEFAULT 'mpesa',
    transaction_id VARCHAR(255),
    phone_number VARCHAR(255),
    status ENUM('pending', 'completed', 'failed') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);
