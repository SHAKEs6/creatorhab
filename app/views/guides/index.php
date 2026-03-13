<?php require APPROOT . '/views/templates/header.php'; ?>

<section id="guides" class="section" style="padding-top: 8rem; min-height: 80vh;">
    <div class="section-header text-center mb-5">
        <span class="badge">Master the Algorithm</span>
        <h2 class="mt-2 text-gradient"><?php echo $data['title']; ?></h2>
        <p class="text-dim"><?php echo $data['description']; ?></p>
        
        <!-- Premium Search Bar -->
        <div class="search-container mt-4" style="max-width: 600px; margin: 2rem auto 0; position: relative;">
            <form action="<?php echo URLROOT; ?>/guides" method="GET">
                <i class="fa-solid fa-search" style="position: absolute; left: 1.5rem; top: 50%; transform: translateY(-50%); color: var(--accent-red); opacity: 0.6;"></i>
                <input type="text" name="q" value="<?php echo isset($data['search_query']) ? $data['search_query'] : ''; ?>" placeholder="Search guides (e.g. 'niche', 'growth')..." style="width: 100%; padding: 1.2rem 1.2rem 1.2rem 3.5rem; background: rgba(255,255,255,0.05); border: 1px solid var(--border-color); border-radius: 50px; color: white; font-size: 1rem; transition: 0.3s; outline: none;" onfocus="this.style.borderColor='var(--accent-red)'">
            </form>
        </div>
    </div>
    
    <?php if (!empty($data['page_videos'])) : ?>
        <div class="videos-section mb-5" style="max-width: 1000px; margin: 0 auto;">
            <h3>Featured Videos for Guides</h3>
            <div class="grid grid-2" style="gap: 1.5rem;">
                <?php foreach ($data['page_videos'] as $vid) : ?>
                    <div class="card glass-card" style="padding: 1rem;">
                        <h4><?php echo htmlspecialchars($vid->video_title); ?></h4>
                        <div class="video-container" style="position: relative; padding-bottom: 56.25%; height: 0;">
                            <iframe src="https://www.youtube.com/embed/<?php echo htmlspecialchars($vid->video_id); ?>" frameborder="0" allowfullscreen style="position: absolute; top:0; left:0; width:100%; height:100%;"></iframe>
                        </div>
                        <?php if (!empty($vid->description)) : ?>
                            <p class="text-dim mt-2"><?php echo htmlspecialchars($vid->description); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="grid grid-2 mt-4" style="gap: 2.5rem; max-width: 1000px; margin: 3rem auto 0;">
        <?php foreach($data['guides'] as $index => $guide) : ?>
            <div class="card roadmap-step glass-card hover-up" style="padding: 2.5rem; position: relative; border-radius: 20px;">
                <div class="step-icon mb-4" style="width: 70px; height: 70px; background: rgba(255,0,0,0.1); border-radius: 15px; display: flex; align-items: center; justify-content: center; font-size: 2rem; color: var(--accent-red);">
                    <?php 
                        $icon = 'fa-map';
                        if(str_contains(strtolower($guide->category), 'growth')) $icon = 'fa-chart-line';
                        if(str_contains(strtolower($guide->category), 'monetization')) $icon = 'fa-sack-dollar';
                        if(str_contains(strtolower($guide->category), 'automation')) $icon = 'fa-gear';
                    ?>
                    <i class="fa-solid <?php echo $icon; ?>"></i>
                </div>
                <div class="step-num" style="position: absolute; top: 1.5rem; right: 2rem; font-size: 3rem; font-weight: 900; opacity: 0.1; font-family: 'Outfit';">0<?php echo $index + 1; ?></div>
                <h3 class="mb-3"><?php echo htmlspecialchars($guide->title); ?></h3>
                <p class="text-dim mb-4" style="line-height: 1.6;"><?php echo htmlspecialchars($guide->description); ?></p>
                <a href="<?php echo URLROOT; ?>/guides/show/<?php echo $guide->id; ?>" class="btn btn-outline btn-sm">Read Full Guide</a>
            </div>
        <?php endforeach; ?>
        
        <?php if(empty($data['guides'])) : ?>
            <div class="card glass-card text-center" style="grid-column: span 2; padding: 3rem;">
                <p class="text-dim">No guides found matching your search. Check back later for expert strategies!</p>
            </div>
        <?php endif; ?>
    </div>
    
    <div class="roadmap-line"></div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
