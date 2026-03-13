<?php require APPROOT . '/views/templates/header.php'; ?>

<section class="section" style="padding-top: 8rem; min-height: 80vh;">
    <div class="section-header text-center">
        <h2><?php echo $data['title']; ?></h2>
        <p class="text-dim"><?php echo $data['description']; ?></p>
    </div>
    
    <div class="grid grid-2 mt-4" style="gap: 2rem;">
        <div class="card glass-card hover-up text-center" style="padding: 3rem;">
            <i class="fa-solid fa-play theme-icon" style="font-size: 3rem; color: var(--accent-red); margin-bottom: 1rem;"></i>
            <h3>Start a Channel</h3>
            <p class="mb-3 text-dim">Learn the exact step-by-step roadmap to launch your channel correctly from day one.</p>
            <a href="<?php echo URLROOT; ?>/guides/start" class="btn btn-primary">Read Guide</a>
        </div>
        
        <div class="card glass-card hover-up text-center" style="padding: 3rem;">
            <i class="fa-solid fa-money-bill-trend-up theme-icon" style="font-size: 3rem; color: var(--accent-red); margin-bottom: 1rem;"></i>
            <h3>Monetization</h3>
            <p class="mb-3 text-dim">Discover the fastest strategies to join the YouTube Partner Program and get paid.</p>
            <a href="<?php echo URLROOT; ?>/guides/monetization" class="btn btn-primary">Read Guide</a>
        </div>
        
        <div class="card glass-card hover-up text-center" style="padding: 3rem;">
            <i class="fa-solid fa-chart-line theme-icon" style="font-size: 3rem; color: var(--accent-red); margin-bottom: 1rem;"></i>
            <h3>Growth Strategies</h3>
            <p class="mb-3 text-dim">Master the algorithm. Learn the tactics the top 1% of creators use to go viral.</p>
            <a href="<?php echo URLROOT; ?>/guides/growth" class="btn btn-primary">Read Guide</a>
        </div>
        
        <div class="card glass-card hover-up text-center" style="padding: 3rem;">
            <i class="fa-solid fa-robot theme-icon" style="font-size: 3rem; color: var(--accent-red); margin-bottom: 1rem;"></i>
            <h3>Automation</h3>
            <p class="mb-3 text-dim">Build passive income channels safely and efficiently without showing your face.</p>
            <a href="<?php echo URLROOT; ?>/guides/automation" class="btn btn-primary">Read Guide</a>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
