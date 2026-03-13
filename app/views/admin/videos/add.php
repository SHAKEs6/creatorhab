<?php require APPROOT . '/views/templates/header.php'; ?>

<section class="section" style="padding-top: 8rem; min-height: 90vh;">
    <div class="container" style="max-width: 700px;">
        <div class="mb-5">
            <h2 class="text-gradient">Video Management</h2>
            <p class="text-dim">Your platform is now connected to Faustin Shukranke's YouTube channel</p>
        </div>

        <div class="card glass-card" style="padding: 3rem; border-left: 5px solid var(--accent-red);">
            <div style="text-align: center; margin-bottom: 2rem;">
                <i class="fa-brands fa-youtube" style="font-size: 4rem; color: var(--accent-red); margin-bottom: 1rem;"></i>
                <h3 class="mb-2">Live Channel Feed Enabled</h3>
                <p class="text-dim">Videos are automatically synced from the Faustin Shukranke channel</p>
            </div>

            <div style="background: rgba(255,0,0,0.05); padding: 2rem; border-radius: 12px; margin: 2rem 0; border: 1px solid rgba(255,0,0,0.1);">
                <h4 style="margin-bottom: 1rem; color: var(--accent-red);">How it works:</h4>
                <ul style="list-style: none; padding: 0; display: flex; flex-direction: column; gap: 1rem;">
                    <li style="display: flex; align-items: flex-start; gap: 1rem;">
                        <span class="badge" style="min-width: 30px; text-align: center;">1</span>
                        <div>New videos uploaded to the channel automatically appear on your platform</div>
                    </li>
                    <li style="display: flex; align-items: flex-start; gap: 1rem;">
                        <span class="badge" style="min-width: 30px; text-align: center;">2</span>
                        <div>No manual video ID entries needed - it's all automated</div>
                    </li>
                    <li style="display: flex; align-items: flex-start; gap: 1rem;">
                        <span class="badge" style="min-width: 30px; text-align: center;">3</span>
                        <div>Users see the latest content from the channel directly</div>
                    </li>
                </ul>
            </div>

            <div class="flex" style="gap: 1rem;">
                <a href="<?php echo URLROOT; ?>/admin/videos" class="btn btn-primary btn-full" style="text-align: center;">View Channel Feed</a>
                <a href="<?php echo URLROOT; ?>/admin" class="btn btn-outline btn-full" style="text-align: center;">Back to Dashboard</a>
            </div>
        </div>

        <div class="card glass-card" style="padding: 2rem; margin-top: 2rem; background: rgba(0,206,201,0.05); border: 1px solid rgba(0,206,201,0.2);">
            <h4 style="color: #00cec9; margin-bottom: 1rem;"><i class="fa-solid fa-info-circle"></i> Channel Information</h4>
            <p class="text-dim mb-2"><strong>Channel:</strong> Faustin Shukranke</p>
            <p class="text-dim mb-2"><strong>Type:</strong> YouTube Creator Channel (Uploads Feed)</p>
            <p class="text-dim"><strong>Status:</strong> <span style="color: #2ecc71;">● Active & Synced</span></p>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
