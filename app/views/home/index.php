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
                    <img src="<?php echo URLROOT; ?>/assets/images/hero1.png" alt="User 1">
                    <img src="<?php echo URLROOT; ?>/assets/images/hero2.png" alt="User 2">
                    <img src="<?php echo URLROOT; ?>/assets/images/hero3.png" alt="User 3">
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
                    <h4>ksh4,250</h4>
                    <p>AdSense Revenue</p>
                </div>
            </div>
        </div>
    </header>
    <!-- Trending Videos Section -->
    <section class="section" style="padding: 5rem 0; background: rgba(255,0,0,0.02);">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 1rem;">
            <div class="section-header mb-5" style="display: flex; justify-content: space-between; align-items: flex-end;">
                <div>
                    <span class="badge">Hot Right Now</span>
                    <h2 class="mt-2 text-gradient">Trending Strategy</h2>
                </div>
                <a href="<?php echo URLROOT; ?>/guides" class="text-accent" style="font-weight: 600;">View All <i class="fa-solid fa-arrow-right ml-2"></i></a>
            </div>
            
            <div class="grid grid-1" style="gap: 2rem;">
                <?php foreach($data['trending_videos'] as $video) : ?>
                <div class="card glass-card hover-up" style="padding: 0; overflow: hidden; border: 1px solid rgba(255,255,255,0.05);">
                    <!-- Faustin Shukranke Channel Latest Videos -->
                    <div class="video-container" style="position: relative; padding-bottom: 56.25%; height: 0; background: #000; border-radius: 12px; overflow: hidden;">
                        <iframe 
                            width="100%" height="100%" 
                            src="https://www.youtube.com/embed/videoseries?list=UUOukwmNNzC3ChA4w13sNZfA&si=nkZqpiWrRyYu2WMX" 
                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                        </iframe>
                    </div>
                    <div style="padding: 1.5rem;">
                        <span class="badge mb-2" style="font-size: 0.7rem; background: var(--accent-red); color: white;">Live Channel Feed</span>
                        <h4 style="font-size: 1.3rem; line-height: 1.4;">Faustin Shukran Channel Videos</h4>
                        <p class="text-dim" style="font-size: 0.9rem; margin-top: 0.5rem;">Watch latest videos directly from the channel</p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Featured Videos Section -->
    <section class="section" style="padding: 5rem 0;">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 1rem;">
            <div class="section-header mb-5" style="text-align: center;">
                <span class="badge">Fresh Content</span>
                <h2 class="mt-2 text-gradient">Featured YouTube Videos</h2>
                <p class="text-dim">Premium content to inspire your channel growth</p>
            </div>
            
            <div class="grid grid-3" style="gap: 2rem;">
                <!-- Video 1 -->
                <div class="card glass-card hover-up" style="padding: 0; overflow: hidden; border: 1px solid rgba(255,255,255,0.05);">
                    <div class="video-container" style="position: relative; padding-bottom: 56.25%; height: 0; background: #000; border-radius: 12px; overflow: hidden;">
                        <iframe 
                            width="100%" height="100%" 
                            src="https://www.youtube.com/embed/Lk_4GUymeOI" 
                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                        </iframe>
                    </div>
                    <div style="padding: 1.5rem;">
                        <span class="badge mb-2" style="font-size: 0.7rem; background: #ff6b6b; color: white;">Latest</span>
                        <p class="text-dim" style="font-size: 0.9rem;">Check out this amazing YouTube content</p>
                    </div>
                </div>

                <!-- Video 2 -->
                <div class="card glass-card hover-up" style="padding: 0; overflow: hidden; border: 1px solid rgba(255,255,255,0.05);">
                    <div class="video-container" style="position: relative; padding-bottom: 56.25%; height: 0; background: #000; border-radius: 12px; overflow: hidden;">
                        <iframe 
                            width="100%" height="100%" 
                            src="https://www.youtube.com/embed/QB26WVge0s8" 
                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                        </iframe>
                    </div>
                    <div style="padding: 1.5rem;">
                        <span class="badge mb-2" style="font-size: 0.7rem; background: #4ecdc4; color: white;">Trending</span>
                        <p class="text-dim" style="font-size: 0.9rem;">Discover creator strategies & tips</p>
                    </div>
                </div>

                <!-- Video 3 -->
                <div class="card glass-card hover-up" style="padding: 0; overflow: hidden; border: 1px solid rgba(255,255,255,0.05);">
                    <div class="video-container" style="position: relative; padding-bottom: 56.25%; height: 0; background: #000; border-radius: 12px; overflow: hidden;">
                        <iframe 
                            width="100%" height="100%" 
                            src="https://www.youtube.com/embed/hKF1RL45HTQ" 
                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                        </iframe>
                    </div>
                    <div style="padding: 1.5rem;">
                        <span class="badge mb-2" style="font-size: 0.7rem; background: #95e1d3; color: #222;">Live</span>
                        <p class="text-dim" style="font-size: 0.9rem;">Join us live for exclusive insights</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- News & Updates Section -->
    <section class="section" style="padding: 5rem 0;">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 1rem;">
            <div class="grid grid-2" style="gap: 4rem; align-items: center;">
                <div class="card glass-card" style="padding: 3rem; border-left: 5px solid var(--accent-red);">
                    <h3 class="mb-4">Platform Updates</h3>
                    <div style="display: flex; flex-direction: column; gap: 2rem;">
                        <?php foreach($data['latest_posts'] as $post) : ?>
                        <div style="border-bottom: 1px solid rgba(255,255,255,0.05); padding-bottom: 1.5rem;">
                            <span class="text-dim" style="font-size: 0.8rem;"><?php echo date('M d, Y', strtotime($post->created_at)); ?></span>
                            <h4 style="margin: 0.5rem 0;"><?php echo $post->title; ?></h4>
                            <p class="text-dim" style="font-size: 0.9rem;"><?php echo $post->content; ?></p>
                        </div>
                        <?php endforeach; ?>
                        <?php if(empty($data['latest_posts'])) : ?>
                            <p class="text-dim">No updates yet. Check back soon!</p>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="newsletter-box">
                    <span class="badge mb-3">Stay Ahead</span>
                    <h2 class="mb-3">Join the Newsletter</h2>
                    <p class="text-dim mb-4" style="font-size: 1.1rem;">Get the latest algorithm updates and creator strategies delivered straight to your inbox.</p>
                    <form class="flex" style="gap: 1rem;">
                        <input type="email" placeholder="Your best email..." style="flex: 1; padding: 1rem; background: rgba(255,255,255,0.05); border: 1px solid var(--border-color); border-radius: 12px; color: white;">
                        <button class="btn btn-primary" type="button">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
