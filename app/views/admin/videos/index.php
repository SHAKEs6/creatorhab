<?php require APPROOT . '/views/templates/header.php'; ?>

<section class="section" style="padding-top: 8rem; min-height: 90vh;">
    <div class="container">
        <div class="mb-5 flex flex-between">
            <div>
                <h2 class="text-gradient">Video Embeds</h2>
                <p class="text-dim">Manage YouTube videos on the homepage</p>
            </div>
            <div class="flex" style="gap: 1rem;">
                <a href="<?php echo URLROOT; ?>/admin" class="btn btn-outline">Back to HQ</a>
                <a href="<?php echo URLROOT; ?>/admin/add_video" class="btn btn-primary">Embed Video</a>
            </div>
        </div>


        <div class="grid grid-1" style="gap: 2rem;">
            <div class="alert alert-info" style="padding: 1.5rem; background: rgba(0,206,201,0.1); border-left: 4px solid #00cec9; border-radius: 8px;">
                <i class="fa-solid fa-circle-info" style="color: #00cec9; margin-right: 0.5rem;"></i>
                <strong>Live Feed Active:</strong> Videos are now displayed directly from the Faustin Shukranke YouTube channel.
            </div>
            
            <div class="card glass-card" style="padding: 0; overflow: hidden;">
                <div style="position: relative; padding-bottom: 56.25%; height: 0; background: #000;">
                    <iframe 
                        width="100%" height="100%"
                        src="https://www.youtube.com/embed/videoseries?list=UUOukwmNNzC3ChA4w13sNZfA&si=nkZqpiWrRyYu2WMX" 
                        style="position: absolute; top:0; left:0; width:100%; height:100%; border:0;" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen>
                    </iframe>
                </div>
                <div style="padding: 1.5rem;">
                    <div class="flex flex-between mb-2">
                        <span class="badge" style="background: var(--accent-red); color: white;">Live Feed</span>
                        <span class="badge">Faustin Shukranke</span>
                    </div>
                    <h4 class="mb-3">YouTube Channel Videos</h4>
                    <p class="text-dim">All new uploads from the channel are automatically displayed. No manual video management required.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>

<?php require APPROOT . '/views/templates/footer.php'; ?>
