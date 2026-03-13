<?php require APPROOT . '/views/templates/header.php'; ?>

<section id="resources" class="section section-dark" style="padding-top: 8rem; min-height: 80vh;">
    <div class="section-header text-center mb-5">
        <span class="badge">Free Creator Assets</span>
        <h2 class="mt-2 text-gradient"><?php echo $data['title']; ?></h2>
        <p class="text-dim"><?php echo $data['description']; ?></p>
    </div>
    
    <div class="grid grid-3 mt-4">
        <!-- Category: Strategy -->
        <div class="card hub-card glass-card hover-up">
            <div class="hub-header mb-4">
                <div style="width: 50px; height: 50px; background: rgba(255,0,0,0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                    <i class="fa-solid fa-map" style="font-size: 1.5rem; color: var(--accent-red);"></i>
                </div>
                <h3 style="font-size: 1.4rem;">Channel Strategy</h3>
            </div>
            <ul class="resource-list" style="display: flex; flex-direction: column; gap: 1rem; margin-bottom: 2rem;">
                <li style="display: flex; justify-content: space-between; align-items: center; padding: 0.8rem; background: rgba(255,255,255,0.03); border-radius: 8px;">
                    <span style="font-size: 0.9rem;"><i class="fa-solid fa-file-pdf mr-2" style="color: var(--accent-red);"></i> Ultimate Checklist</span>
                    <i class="fa-solid fa-download text-dim"></i>
                </li>
                <li style="display: flex; justify-content: space-between; align-items: center; padding: 0.8rem; background: rgba(255,255,255,0.03); border-radius: 8px;">
                    <span style="font-size: 0.9rem;"><i class="fa-solid fa-file-lines mr-2"></i> SEO Magic Keywords</span>
                    <i class="fa-solid fa-download text-dim"></i>
                </li>
            </ul>
            <button class="btn btn-primary btn-full btn-sm">Download Strategy Pack</button>
        </div>

        <!-- Category: Design -->
        <div class="card hub-card glass-card hover-up" style="border-top: 2px solid var(--accent-red);">
            <div class="hub-header mb-4">
                <div style="width: 50px; height: 50px; background: rgba(255,0,0,0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                    <i class="fa-solid fa-palette" style="font-size: 1.5rem; color: var(--accent-red);"></i>
                </div>
                <h3 style="font-size: 1.4rem;">Visual Assets</h3>
            </div>
            <ul class="resource-list" style="display: flex; flex-direction: column; gap: 1rem; margin-bottom: 2rem;">
                <li style="display: flex; justify-content: space-between; align-items: center; padding: 0.8rem; background: rgba(255,255,255,0.03); border-radius: 8px;">
                    <span style="font-size: 0.9rem;"><i class="fa-solid fa-image mr-2"></i> PSD Thumbnails (50+)</span>
                    <i class="fa-solid fa-download text-dim"></i>
                </li>
                <li style="display: flex; justify-content: space-between; align-items: center; padding: 0.8rem; background: rgba(255,255,255,0.03); border-radius: 8px;">
                    <span style="font-size: 0.9rem;"><i class="fa-solid fa-font mr-2"></i> Viral Font Collection</span>
                    <i class="fa-solid fa-download text-dim"></i>
                </li>
            </ul>
            <button class="btn btn-primary btn-full btn-sm">Access Assets</button>
        </div>
        
        <!-- Category: Systems -->
        <div class="card hub-card glass-card hover-up">
            <div class="hub-header mb-4">
                <div style="width: 50px; height: 50px; background: rgba(255,0,0,0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                    <i class="fa-solid fa-gears" style="font-size: 1.5rem; color: var(--accent-red);"></i>
                </div>
                <h3 style="font-size: 1.4rem;">Productivity</h3>
            </div>
            <ul class="resource-list" style="display: flex; flex-direction: column; gap: 1rem; margin-bottom: 2rem;">
                <li style="display: flex; justify-content: space-between; align-items: center; padding: 0.8rem; background: rgba(255,255,255,0.03); border-radius: 8px;">
                    <span style="font-size: 0.9rem;"><i class="fa-brands fa-notion mr-2"></i> Viral Idea Generator</span>
                    <i class="fa-solid fa-external-link text-dim"></i>
                </li>
                <li style="display: flex; justify-content: space-between; align-items: center; padding: 0.8rem; background: rgba(255,255,255,0.03); border-radius: 8px;">
                    <span style="font-size: 0.9rem;"><i class="fa-solid fa-table mr-2"></i> Scripting Template</span>
                    <i class="fa-solid fa-download text-dim"></i>
                </li>
            </ul>
            <button class="btn btn-primary btn-full btn-sm">Get Templates</button>
        </div>
    </div>
    
    <div class="text-center mt-5">
        <div class="card glass-card" style="display: inline-block; padding: 3rem; max-width: 800px; background: linear-gradient(135deg, rgba(255,0,0,0.1), rgba(0,0,0,0.5)); border: 1px solid rgba(255,0,0,0.2);">
            <h3 style="font-size: 2rem; margin-bottom: 1rem;">Unlock Premium Tools?</h3>
            <p class="text-dim mb-4" style="font-size: 1.1rem;">Get access to our AI-powered title generators, tag extractors, and niche researchers to skyrocket your growth.</p>
            <div style="display: flex; gap: 1.5rem; justify-content: center;">
                <a href="<?php echo URLROOT; ?>/tools" class="btn btn-primary btn-lg">Explore Tools</a>
                <a href="<?php echo URLROOT; ?>/auth/register" class="btn btn-outline btn-lg">Join CreatorHub</a>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
