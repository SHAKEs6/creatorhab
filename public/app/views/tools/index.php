<?php require APPROOT . '/views/templates/header.php'; ?>

<section id="tools" class="section" style="padding-top: 8rem; min-height: 80vh;">
    <div class="section-header text-center">
        <h2><?php echo $data['title']; ?></h2>
        <p><?php echo $data['description']; ?></p>
    </div>
    
    <div class="grid grid-2 mt-4">
        <!-- AI Title Generator -->
        <div class="card glass-card">
            <h3 class="mb-3"><i class="fa-solid fa-heading theme-icon" style="color: var(--accent-red);"></i> Title Generator</h3>
            <p class="text-dim mb-4">Input your video topic and let our AI generate 10 highly clickable, curiosity-driven titles.</p>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="E.g., How to cook pasta" style="width: 100%; padding: 1rem; background: rgba(255,255,255,0.05); color: white; border: 1px solid rgba(255,255,255,0.1); border-radius: var(--radius-sm); margin-bottom: 1rem;">
                <button class="btn btn-primary w-100">Generate Titles</button>
            </div>
            <div class="results mt-3 p-3" style="background: rgba(0,0,0,0.5); border-radius: var(--radius-sm); min-height: 100px; display: none;"></div>
        </div>

        <!-- Tag Extractor -->
        <div class="card glass-card">
            <h3 class="mb-3"><i class="fa-solid fa-tags theme-icon" style="color: var(--accent-red);"></i> Tag Extractor</h3>
            <p class="text-dim mb-4">Paste a competitor's YouTube video URL to instantly reveal and copy their hidden tags.</p>
            <div class="form-group">
                <input type="url" class="form-control" placeholder="https://youtube.com/watch?v=..." style="width: 100%; padding: 1rem; background: rgba(255,255,255,0.05); color: white; border: 1px solid rgba(255,255,255,0.1); border-radius: var(--radius-sm); margin-bottom: 1rem;">
                <button class="btn btn-primary w-100">Extract Tags</button>
            </div>
            <div class="results mt-3 p-3" style="background: rgba(0,0,0,0.5); border-radius: var(--radius-sm); min-height: 100px; display: none;"></div>
        </div>

        <!-- Thumbnail Tester -->
        <div class="card glass-card">
            <h3 class="mb-3"><i class="fa-solid fa-image theme-icon" style="color: var(--accent-red);"></i> Thumbnail Tester</h3>
            <p class="text-dim mb-4">Upload two variations of a thumbnail to test how they look in YouTube's Dark and Light modes.</p>
            <div class="dropzone p-4 text-center" style="border: 2px dashed rgba(255,255,255,0.2); border-radius: var(--radius-sm); cursor: pointer; transition: all 0.3s ease;">
                <i class="fa-solid fa-cloud-arrow-up mb-2" style="font-size: 2rem; color: var(--text-dim);"></i>
                <p class="text-dim">Drag & drop or click to upload</p>
            </div>
        </div>

        <!-- AI Script Writer -->
        <div class="card glass-card">
            <h3 class="mb-3"><i class="fa-solid fa-robot theme-icon" style="color: var(--accent-red);"></i> AI Script Writer</h3>
            <p class="text-dim mb-4">Generate an engaging hook, intro, and structured outline for your next video in seconds.</p>
            <div class="form-group">
                <textarea class="form-control" rows="3" placeholder="Describe your video idea in a few sentences..." style="width: 100%; padding: 1rem; background: rgba(255,255,255,0.05); color: white; border: 1px solid rgba(255,255,255,0.1); border-radius: var(--radius-sm); margin-bottom: 1rem; resize: none;"></textarea>
                <button class="btn btn-primary w-100">Write Script Outline</button>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
