<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITENAME; ?> | <?php echo isset($data['title']) ? $data['title'] : 'Start, Grow & Monetize Your YouTube Channel'; ?></title>
    <meta name="description" content="The ultimate creator platform. Learn how to grow your YouTube channel, buy monetized channels, or book an expert consultation today.">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="<?php echo URLROOT; ?>/public/script.js"></script>
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="<?php echo URLROOT; ?>" class="logo">
                <i class="fa-brands fa-youtube"></i> Creator<span>Hub</span>
            </a>
            <ul class="nav-links">
                <li><a href="<?php echo URLROOT; ?>/guides">Guides</a></li>
                <li><a href="<?php echo URLROOT; ?>/marketplace">Marketplace</a></li>
                <li><a href="<?php echo URLROOT; ?>/courses">Courses</a></li>
                <li><a href="<?php echo URLROOT; ?>/consultation">Consulting</a></li>
                <li><a href="<?php echo URLROOT; ?>/resources">Resources</a></li>
                <?php if(isset($_SESSION['user_id'])) : ?>
                    <li><a href="<?php echo URLROOT; ?>/dashboard">Dashboard</a></li>
                    <!-- Notification Bell -->
                    <li class="notification-bell-container">
                        <button class="notification-bell" id="notification-bell">
                            <i class="fas fa-bell"></i>
                            <span class="notification-badge" id="notification-count" style="display: none;">0</span>
                        </button>
                        <div class="notification-dropdown" id="notification-dropdown">
                            <div class="notification-header">
                                <h3>Notifications</h3>
                                <button class="close-notifications" id="close-notifications">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div class="notification-list" id="notification-list">
                                <p class="empty-message">No notifications yet</p>
                            </div>
                        </div>
                    </li>
                    <li><a href="<?php echo URLROOT; ?>/auth/logout">Logout</a></li>
                <?php else : ?>
                    <li><a href="<?php echo URLROOT; ?>/auth/login">Login</a></li>
                <?php endif; ?>
            </ul>
            <?php if(!isset($_SESSION['user_id'])) : ?>
                <a href="<?php echo URLROOT; ?>/auth/register" class="btn btn-primary d-none-mobile">Join Now</a>
            <?php endif; ?>
            <button class="mobile-menu-btn" id="mobile-btn">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </nav>
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const mobileBtn = document.getElementById('mobile-btn');
            const navLinks = document.querySelector('.nav-links');
            
            if(mobileBtn) {
                mobileBtn.addEventListener('click', () => {
                    navLinks.classList.toggle('active');
                });
            }
        });
    </script>
