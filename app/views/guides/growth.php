<?php require APPROOT . '/views/templates/header.php'; ?>

<section id="growth" class="section" style="padding-top: 8rem; min-height: 80vh;">
    <div class="section-header">
        <h2><?php echo $data['title']; ?></h2>
        <p>Master the algorithm. Learn the tactics the top 1% of creators use to go viral.</p>
    </div>
    
    <div class="grid grid-3 growth-grid mt-4">
        <div class="card hover-up">
            <i class="fa-solid fa-magnifying-glass theme-icon"></i>
            <h3>YouTube SEO</h3>
            <p>Rank #1 in search results by leveraging keyword research, optimal tags, and metadata formatting.</p>
        </div>
        <div class="card hover-up">
            <i class="fa-solid fa-pen-nib theme-icon"></i>
            <h3>Writing Viral Titles</h3>
            <p>Learn the psychology behind click-worthy titles that trigger curiosity and urgency.</p>
        </div>
        <div class="card hover-up">
            <i class="fa-solid fa-image theme-icon"></i>
            <h3>Thumbnail Design</h3>
            <p>Design high-CTR thumbnails using color theory, face expressions, and minimal text.</p>
        </div>
        <div class="card hover-up">
            <i class="fa-solid fa-chart-line theme-icon"></i>
            <h3>Algorithm Strategy</h3>
            <p>Understand how YouTube's recommendation system categorizes and promotes your content.</p>
        </div>
        <div class="card hover-up">
            <i class="fa-solid fa-hashtag theme-icon"></i>
            <h3>Hashtags & Descriptions</h3>
            <p>Maximize organic reach by structuring your video descriptions and utilizing the right hashtags.</p>
        </div>
        <div class="card hover-up">
            <i class="fa-solid fa-calendar-days theme-icon"></i>
            <h3>Posting Schedule</h3>
            <p>Discover the best times to post and build consistency that trains the algorithm.</p>
        </div>
    </div>
    
    <div class="text-center mt-5">
        <a href="<?php echo URLROOT; ?>/guides" class="btn btn-outline"><i class="fa-solid fa-arrow-left"></i> Back to Guides</a>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
