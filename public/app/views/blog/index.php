<?php require APPROOT . '/views/templates/header.php'; ?>

<section id="blog" class="section" style="padding-top: 8rem; min-height: 80vh;">
    <div class="section-header text-center">
        <h2><?php echo $data['title']; ?></h2>
        <p><?php echo $data['description']; ?></p>
    </div>
    
    <div class="grid grid-3 mt-4">
        <!-- Blog Post 1 -->
        <div class="card blog-card p-0" style="overflow: hidden;">
            <img src="https://images.unsplash.com/photo-1611162617474-5b21e879e113?w=500" alt="Blog" style="width: 100%; height: 200px; object-fit: cover;">
            <div style="padding: 1.5rem;">
                <span class="badge" style="margin-bottom: 0.5rem; display: inline-block;">Growth</span>
                <h3>How to hit 1,000 Subs Fast in 2024</h3>
                <p class="text-dim mb-3">The exact step-by-step framework to reach the monetization threshold...</p>
                <div class="flex-row" style="justify-content: space-between; align-items: center;">
                    <span class="text-dim" style="font-size: 0.8rem;"><i class="fa-regular fa-clock"></i> 5 min read</span>
                    <a href="#" class="btn btn-outline btn-sm">Read More</a>
                </div>
            </div>
        </div>

        <!-- Blog Post 2 -->
        <div class="card blog-card p-0" style="overflow: hidden;">
            <img src="https://images.unsplash.com/photo-1620616901869-2cd16be17fcc?w=500" alt="Blog" style="width: 100%; height: 200px; object-fit: cover;">
            <div style="padding: 1.5rem;">
                <span class="badge" style="margin-bottom: 0.5rem; display: inline-block;">Monetization</span>
                <h3>Top 10 High RPM Niches</h3>
                <p class="text-dim mb-3">Discover which niches pay the highest AdSense rates this year...</p>
                <div class="flex-row" style="justify-content: space-between; align-items: center;">
                    <span class="text-dim" style="font-size: 0.8rem;"><i class="fa-regular fa-clock"></i> 8 min read</span>
                    <a href="#" class="btn btn-outline btn-sm">Read More</a>
                </div>
            </div>
        </div>
        
        <!-- Blog Post 3 -->
        <div class="card blog-card p-0" style="overflow: hidden;">
            <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=500" alt="Blog" style="width: 100%; height: 200px; object-fit: cover;">
            <div style="padding: 1.5rem;">
                <span class="badge" style="margin-bottom: 0.5rem; display: inline-block;">Hardware</span>
                <h3>Best Camera Gear for Beginners</h3>
                <p class="text-dim mb-3">You don't need a $3,000 camera. Here is the ultimate budget setup...</p>
                <div class="flex-row" style="justify-content: space-between; align-items: center;">
                    <span class="text-dim" style="font-size: 0.8rem;"><i class="fa-regular fa-clock"></i> 6 min read</span>
                    <a href="#" class="btn btn-outline btn-sm">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
