<?php require APPROOT . '/views/templates/header.php'; ?>

<section class="section" style="padding-top: 8rem; min-height: 90vh;">
    <div class="container" style="max-width: 1000px;">
        <div class="section-header mb-4 text-center">
            <h2 class="text-gradient"><?php echo htmlspecialchars($data['guide']->title); ?></h2>
            <p class="text-dim"><?php echo htmlspecialchars($data['guide']->description); ?></p>
        </div>

        <?php if (!empty($data['page_videos'])) : ?>
            <div class="videos-section mb-5">
                <h3>Related Videos</h3>
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

        <div class="card glass-card" style="padding: 2rem;">
            <div class="content" style="line-height: 1.6;">
                <?php echo nl2br(htmlspecialchars($data['guide']->content)); ?>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>