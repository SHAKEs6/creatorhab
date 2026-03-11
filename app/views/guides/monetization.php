<?php require APPROOT . '/views/templates/header.php'; ?>

<section class="section section-dark" style="padding-top: 8rem; min-height: 80vh;">
    <div class="monetization-container">
        <div class="monetization-text">
            <h2><?php echo $data['title']; ?></h2>
            <p>Track your progress directly and learn the fastest strategies to join the YouTube Partner Program.</p>
            
            <div class="requirements-list mt-4">
                <div class="req-item" style="margin-bottom: 1.5rem;">
                    <i class="fa-solid fa-users text-accent" style="font-size: 2rem; margin-right: 1.5rem;"></i>
                    <div>
                        <h4>1,000 Subscribers</h4>
                        <p class="text-dim">Build a loyal community.</p>
                    </div>
                </div>
                <div class="req-item" style="margin-bottom: 1.5rem;">
                    <i class="fa-solid fa-clock text-accent" style="font-size: 2rem; margin-right: 1.5rem;"></i>
                    <div>
                        <h4>4,000 Watch Hours or 10M Shorts Views</h4>
                        <p class="text-dim">Consistent, high-retention content.</p>
                    </div>
                </div>
                <div class="req-item" style="margin-bottom: 1.5rem;">
                    <i class="fa-solid fa-money-check-dollar text-accent" style="font-size: 2rem; margin-right: 1.5rem;"></i>
                    <div>
                        <h4>AdSense Setup</h4>
                        <p class="text-dim">Link your bank and get paid.</p>
                    </div>
                </div>
                <div class="req-item">
                    <i class="fa-solid fa-shield-halved text-accent" style="font-size: 2rem; margin-right: 1.5rem;"></i>
                    <div>
                        <h4>Community Guidelines</h4>
                        <p class="text-dim">Avoid copyright strikes and violations.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="monetization-visual">
            <div class="glass-panel progress-panel" style="padding: 2rem;">
                <h3 class="mb-3">Partner Program Eligibility Demo</h3>
                
                <div class="progress-block">
                    <div class="progress-labels" style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                        <span>Subscribers</span>
                        <span>840 / 1,000</span>
                    </div>
                    <div class="progress-bar-bg" style="width: 100%; background: rgba(255,255,255,0.1); height: 10px; border-radius: 5px; overflow: hidden;"><div class="progress-bar fill-red" style="width: 84%; height: 100%; background: var(--accent-red);"></div></div>
                </div>
                
                <div class="progress-block" style="margin-top: 1.5rem;">
                    <div class="progress-labels" style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                        <span>Public Watch Hours</span>
                        <span>3,200 / 4,000</span>
                    </div>
                    <div class="progress-bar-bg" style="width: 100%; background: rgba(255,255,255,0.1); height: 10px; border-radius: 5px; overflow: hidden;"><div class="progress-bar fill-red" style="width: 80%; height: 100%; background: var(--accent-red);"></div></div>
                </div>
                
                <button class="btn btn-outline btn-full mt-4" disabled style="opacity: 0.5; cursor: not-allowed; width: 100%;">Apply Now (Locked)</button>
            </div>
        </div>
    </div>
    
    <div class="text-center" style="margin-top: 4rem;">
        <a href="<?php echo URLROOT; ?>/guides" class="btn btn-outline"><i class="fa-solid fa-arrow-left"></i> Back to Guides</a>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
