<?php

// Database Configuration
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_USER', getenv('DB_USER') ?: 'root');
define('DB_PASS', getenv('DB_PASS') ?: '');
define('DB_NAME', getenv('DB_NAME') ?: 'creator_platform');

// App Root
define('APPROOT', dirname(dirname(__FILE__)));
// URL Root - Use environment variable in production
define('URLROOT', getenv('URLROOT') ?: 'http://localhost:8080');
// Site Name
define('SITENAME', 'CreatorHub');

// M-Pesa Integration Credentials
define('MPESA_CONSUMER_KEY', getenv('MPESA_CONSUMER_KEY') ?: 'vDXXiJeWC3Qzx1kaDvyAcdaAVoGxPrgqDe5Kamaf6qCgQU0Z');
define('MPESA_CONSUMER_SECRET', getenv('MPESA_CONSUMER_SECRET') ?: 'E4IeCXfPIzmqoruudi3p1TgTZqFbq12MIyuUwbXiMT7GjE3uWlodNqG1UHcmLuGk');

// YouTube Channel Configuration
define('YOUTUBE_CHANNEL', 'UCFIY6VZeF-xRiW8MolG8ykg'); // Faustin Shukranke Channel
