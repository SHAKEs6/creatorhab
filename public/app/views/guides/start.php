<?php require APPROOT . '/views/templates/header.php'; ?>

<section class="section" style="padding-top: 8rem; min-height: 80vh;">
    <div class="section-header">
        <h2><?php echo $data['title']; ?></h2>
        <p>From zero to your first video. Follow our step-by-step roadmap to launch correctly.</p>
    </div>
    
    <div class="grid grid-4 step-cards mt-4">
        <div class="card step-card">
            <div class="step-icon"><i class="fa-solid fa-user-plus"></i></div>
            <h3>1. Channel Setup</h3>
            <p>Create your Google account and set up your brand channel properly to secure your handle.</p>
            <ul class="checklist mt-3">
                <li><i class="fa-solid fa-check"></i> Secure Handle</li>
                <li><i class="fa-solid fa-check"></i> Verify Email</li>
            </ul>
        </div>
        <div class="card step-card">
            <div class="step-icon"><i class="fa-solid fa-bullseye"></i></div>
            <h3>2. Profitable Niche</h3>
            <p>Research and pick a high RPM niche that aligns with your passions and market demands.</p>
            <ul class="checklist mt-3">
                <li><i class="fa-solid fa-check"></i> High CPM</li>
                <li><i class="fa-solid fa-check"></i> Low Competition</li>
            </ul>
        </div>
        <div class="card step-card">
            <div class="step-icon"><i class="fa-solid fa-palette"></i></div>
            <h3>3. Channel Branding</h3>
            <p>Design a recognizable profile picture, responsive banner, and engaging watermarks.</p>
            <ul class="checklist mt-3">
                <li><i class="fa-solid fa-check"></i> Custom Banner</li>
                <li><i class="fa-solid fa-check"></i> Brand Colors</li>
            </ul>
        </div>
        <div class="card step-card">
            <div class="step-icon"><i class="fa-solid fa-video"></i></div>
            <h3>4. First Upload</h3>
            <p>Write an SEO-optimized description, generate a catchy title, and upload your debut video!</p>
            <ul class="checklist mt-3">
                <li><i class="fa-solid fa-check"></i> SEO Title</li>
                <li><i class="fa-solid fa-check"></i> Keyword Tags</li>
            </ul>
        </div>
    </div>
    
    <div class="text-center mt-4">
        <a href="<?php echo URLROOT; ?>/guides" class="btn btn-outline"><i class="fa-solid fa-arrow-left"></i> Back to Guides</a>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
