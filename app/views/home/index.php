<?php require APPROOT . '/views/templates/header.php'; ?>

    <!-- Hero Section -->
    <header class="hero">
        <div class="hero-content">
            <div class="badge">🔥 The #1 Platform for YouTube Creators</div>
            <h1>Start, Grow & Monetize Your <span class="text-gradient">YouTube Channel.</span></h1>
            <p>We help creators launch, optimize, and build profitable YouTube channels from scratch. Join thousands of successful creators today.</p>
            
            <div class="hero-buttons">
                <a href="#courses" class="btn btn-primary btn-lg"><i class="fa-solid fa-graduation-cap"></i> Start Learning</a>
                <a href="#marketplace" class="btn btn-secondary btn-lg"><i class="fa-solid fa-store"></i> Buy a Channel</a>
                <a href="#consultation" class="btn btn-outline btn-lg"><i class="fa-solid fa-phone"></i> Talk to an Expert</a>
            </div>

            <div class="testimonials-preview">
                <div class="avatars">
                    <img src="https://i.pravatar.cc/100?img=1" alt="User 1">
                    <img src="https://i.pravatar.cc/100?img=2" alt="User 2">
                    <img src="https://i.pravatar.cc/100?img=3" alt="User 3">
                </div>
                <div class="rating">
                    <div class="stars">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    </div>
                    <span>Trusted by 5,000+ Creators</span>
                </div>
            </div>
        </div>
        <div class="hero-visual">
            <div class="video-thumbnail-container">
                <img src="<?php echo URLROOT; ?>/assets/images/hero-bg.png" alt="Platform Preview" class="hero-video-thumbnail">
                <button class="play-btn"><i class="fa-solid fa-play"></i></button>
            </div>
            
            <!-- Floating cards for effect -->
            <div class="floating-card revenue-card">
                <i class="fa-solid fa-arrow-trend-up"></i>
                <div>
                    <h4>$4,250</h4>
                    <p>AdSense Revenue</p>
                </div>
            </div>
        </div>
    </header>



<?php require APPROOT . '/views/templates/footer.php'; ?>
