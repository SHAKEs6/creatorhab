<?php require APPROOT . '/views/templates/header.php'; ?>

<section class="section" style="padding-top: 8rem; min-height: 90vh;">
    <div class="container">
        <div class="section-header mb-5">
            <h2 class="text-gradient">Admin HQ</h2>
            <p class="text-dim">Manage your content and creator ecosystem</p>
        </div>

        <div class="grid grid-4 mb-5">
            <div class="card glass-card text-center" style="padding: 2rem;">
                <h3 style="font-size: 2.5rem; color: var(--accent-red);"><?php echo $data['guides_count']; ?></h3>
                <p class="text-dim">Guides</p>
            </div>
            <div class="card glass-card text-center" style="padding: 2rem;">
                <h3 style="font-size: 2.5rem; color: #00cec9;"><?php echo $data['videos_count']; ?></h3>
                <p class="text-dim">Videos</p>
            </div>
            <div class="card glass-card text-center" style="padding: 2rem;">
                <h3 style="font-size: 2.5rem; color: #f1c40f;"><?php echo $data['resources_count']; ?></h3>
                <p class="text-dim">Resources</p>
            </div>
            <div class="card glass-card text-center" style="padding: 2rem;">
                <h3 style="font-size: 2.5rem; color: #6c5ce7;"><?php echo $data['products_count']; ?></h3>
                <p class="text-dim">Products</p>
            </div>
        </div>

        <div class="grid grid-2" style="gap: 2rem;">
            <div class="card glass-card" style="padding: 2rem;">
                <h3 class="mb-4">Quick Actions</h3>
                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    <a href="<?php echo URLROOT; ?>/admin-video/index" class="btn btn-primary btn-full text-center"><i class="fa-solid fa-video"></i> Manage Page Videos</a>
                    <a href="<?php echo URLROOT; ?>/admin-users/index" class="btn btn-primary btn-full text-center"><i class="fa-solid fa-users"></i> Manage Users</a>
                    <a href="<?php echo URLROOT; ?>/admin/add_guide" class="btn btn-outline btn-full text-center">Add New Guide</a>
                    <a href="<?php echo URLROOT; ?>/admin/guides" class="btn btn-outline btn-full text-center">Manage All Content</a>
                </div>
            </div>
            <div class="card glass-card" style="padding: 2rem;">
                <h3 class="mb-4">Resource Management</h3>
                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    <a href="#" class="btn btn-outline btn-full text-center">Upload PDF Template</a>
                    <a href="#" class="btn btn-outline btn-full text-center">Post News Update</a>
                    <a href="<?php echo URLROOT; ?>/admin/send_notification" class="btn btn-outline btn-full text-center">Send User Notification</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
