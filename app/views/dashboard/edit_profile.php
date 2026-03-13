<?php require APPROOT . '/views/templates/header.php'; ?>

<section class="section section-dark" style="padding-top: 8rem; min-height: 100vh;">
    <div class="container" style="max-width: 600px;">
        <div class="mb-5">
            <h2 class="text-gradient">Edit Profile</h2>
            <p class="text-dim">Update your profile information</p>
        </div>

        <div class="card glass-card" style="padding: 3rem;">
            <form action="<?php echo URLROOT; ?>/dashboard/edit_profile" method="POST">
                <input type="hidden" name="csrf_token" value="<?php echo csrf_token(); ?>">
                
                <div class="form-group mb-4">
                    <label style="display: block; margin-bottom: 0.8rem; font-weight: 600;">Full Name</label>
                    <input type="text" name="name" class="form-control" style="width: 100%; padding: 1rem; background: rgba(0,0,0,0.3); border: 1px solid var(--border-color); color: white; border-radius: 12px; <?php echo (!empty($data['name_err'])) ? 'border-color: var(--accent-red);' : ''; ?>" value="<?php echo htmlspecialchars($data['name']); ?>" placeholder="Your Full Name" required>
                    <span class="error-msg" style="color: var(--accent-red); font-size: 0.75rem; display: block; margin-top: 0.5rem;"><?php echo $data['name_err']; ?></span>
                </div>

                <div class="form-group mb-4">
                    <label style="display: block; margin-bottom: 0.8rem; font-weight: 600;">Email Address</label>
                    <input type="email" name="email" class="form-control" style="width: 100%; padding: 1rem; background: rgba(0,0,0,0.3); border: 1px solid var(--border-color); color: white; border-radius: 12px; <?php echo (!empty($data['email_err'])) ? 'border-color: var(--accent-red);' : ''; ?>" value="<?php echo htmlspecialchars($data['email']); ?>" placeholder="your@email.com" required>
                    <span class="error-msg" style="color: var(--accent-red); font-size: 0.75rem; display: block; margin-top: 0.5rem;"><?php echo $data['email_err']; ?></span>
                </div>

                <div class="flex" style="gap: 1rem; margin-top: 2rem;">
                    <button type="submit" class="btn btn-primary" style="flex: 1;">Save Changes</button>
                    <a href="<?php echo URLROOT; ?>/dashboard" class="btn btn-outline" style="flex: 1; text-align: center;">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
