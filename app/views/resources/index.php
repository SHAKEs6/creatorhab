<?php require APPROOT . '/views/templates/header.php'; ?>

<section id="resources" class="section section-dark" style="padding-top: 8rem; min-height: 80vh;">
    <div class="section-header text-center">
        <h2><?php echo $data['title']; ?></h2>
        <p><?php echo $data['description']; ?></p>
    </div>
    
    <div class="grid grid-3 mt-4">
        <div class="card hub-card glass-card">
            <div class="hub-header text-center mb-3">
                <i class="fa-solid fa-file-pdf theme-icon" style="font-size: 3rem; color: var(--accent-red);"></i>
                <h3 class="mt-2">Ultimate Checklist</h3>
            </div>
            <p class="text-dim text-center mb-3">The 50-point checklist to launch your channel correctly.</p>
            <button class="btn btn-outline btn-full"><i class="fa-solid fa-download"></i> Download PDF</button>
        </div>

        <div class="card hub-card glass-card">
            <div class="hub-header text-center mb-3">
                <i class="fa-solid fa-images theme-icon" style="font-size: 3rem; color: var(--accent-red);"></i>
                <h3 class="mt-2">Thumbnail Templates</h3>
            </div>
            <p class="text-dim text-center mb-3">Over 50+ proven high-CTR PSD thumbnail templates.</p>
            <button class="btn btn-outline btn-full"><i class="fa-solid fa-download"></i> Download Pack</button>
        </div>
        
        <div class="card hub-card glass-card">
            <div class="hub-header text-center mb-3">
                <i class="fa-solid fa-lightbulb theme-icon" style="font-size: 3rem; color: var(--accent-red);"></i>
                <h3 class="mt-2">Viral Idea Generator</h3>
            </div>
            <p class="text-dim text-center mb-3">A notion template database of 1,000+ proven video ideas.</p>
            <button class="btn btn-outline btn-full"><i class="fa-solid fa-download"></i> Access Template</button>
        </div>
    </div>
    
    <div class="text-center mt-5">
        <div class="card glass-card" style="display: inline-block; padding: 2rem;">
            <h3>Looking for Creator Tools?</h3>
            <p class="text-dim mb-3">Check out our suite of AI-powered title generators and tag extractors.</p>
            <a href="<?php echo URLROOT; ?>/tools" class="btn btn-primary">Go to Tools Suite</a>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
