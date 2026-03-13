<?php require APPROOT . '/views/templates/header.php'; ?>

<section class="section" style="padding-top: 8rem; min-height: 100vh; display: flex; align-items: center; justify-content: center; background: radial-gradient(circle at 90% 80%, rgba(255, 0, 0, 0.05) 0%, transparent 50%);">
    <div class="card glass-card hover-up" style="max-width: 500px; width: 100%; padding: 3rem; border: 1px solid rgba(255,255,255,0.1); border-top: 3px solid var(--accent-red);">
        <div class="text-center mb-5">
            <span class="badge mb-2">Join 1,000+ Creators</span>
            <h2 class="text-gradient">Start Your Journey</h2>
            <p class="text-dim">Get the tools you need to go viral</p>
        </div>
        
        <form action="<?php echo URLROOT; ?>/auth/register" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="csrf_token" value="<?php echo csrf_token(); ?>">
            
            <div class="form-group mb-4 text-center">
                <label for="avatar" style="display: block; cursor: pointer; position: relative; width: 100px; height: 100px; margin: 0 auto;">
                    <img id="avatar-preview" src="<?php echo URLROOT; ?>/uploads/avatars/default.png" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%; border: 3px solid var(--accent-red);">
                    <div style="position: absolute; bottom: 0; right: 0; background: var(--accent-red); color: white; width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.8rem; border: 2px solid white;">
                        <i class="fa-solid fa-camera"></i>
                    </div>
                </label>
                <input type="file" id="avatar" name="avatar" style="display: none;" onchange="document.getElementById('avatar-preview').src = window.URL.createObjectURL(this.files[0])">
                <p class="text-dim mt-2" style="font-size: 0.8rem;">Profile Picture (Optional)</p>
            </div>
            
            <div class="form-group mb-4">
                <label for="name" style="display: block; margin-bottom: 0.8rem; font-size: 0.9rem; color: var(--text-dim);">Full Name</label>
                <input type="text" name="name" class="form-control" style="width: 100%; padding: 1rem; background: rgba(0,0,0,0.3); border: 1px solid var(--border-color); color: white; border-radius: 12px; <?php echo (!empty($data['name_err'])) ? 'border-color: var(--accent-red);' : ''; ?>" value="<?php echo htmlspecialchars($data['name']); ?>" placeholder="Enter your full name">
                <span style="color: var(--accent-red); font-size: 0.75rem; display: block; margin-top: 0.5rem;"><?php echo $data['name_err']; ?></span>
            </div>
            
            <div class="form-group mb-4">
                <label for="email" style="display: block; margin-bottom: 0.8rem; font-size: 0.9rem; color: var(--text-dim);">Email Address</label>
                <input type="email" name="email" class="form-control" style="width: 100%; padding: 1rem; background: rgba(0,0,0,0.3); border: 1px solid var(--border-color); color: white; border-radius: 12px; <?php echo (!empty($data['email_err'])) ? 'border-color: var(--accent-red);' : ''; ?>" value="<?php echo htmlspecialchars($data['email']); ?>" placeholder="name@example.com">
                <span style="color: var(--accent-red); font-size: 0.75rem; display: block; margin-top: 0.5rem;"><?php echo $data['email_err']; ?></span>
            </div>
            
            <div class="grid grid-2 mb-5">
                <div class="form-group">
                    <label for="password" style="display: block; margin-bottom: 0.8rem; font-size: 0.9rem; color: var(--text-dim);">Password</label>
                    <input type="password" name="password" class="form-control" style="width: 100%; padding: 1rem; background: rgba(0,0,0,0.3); border: 1px solid var(--border-color); color: white; border-radius: 12px; <?php echo (!empty($data['password_err'])) ? 'border-color: var(--accent-red);' : ''; ?>" placeholder="••••••••">
                    <span style="color: var(--accent-red); font-size: 0.75rem; display: block; margin-top: 0.5rem;"><?php echo $data['password_err']; ?></span>
                </div>
                
                <div class="form-group">
                    <label for="confirm_password" style="display: block; margin-bottom: 0.8rem; font-size: 0.9rem; color: var(--text-dim);">Confirm</label>
                    <input type="password" name="confirm_password" class="form-control" style="width: 100%; padding: 1rem; background: rgba(0,0,0,0.3); border: 1px solid var(--border-color); color: white; border-radius: 12px; <?php echo (!empty($data['confirm_password_err'])) ? 'border-color: var(--accent-red);' : ''; ?>" placeholder="••••••••">
                    <span style="color: var(--accent-red); font-size: 0.75rem; display: block; margin-top: 0.5rem;"><?php echo $data['confirm_password_err']; ?></span>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary btn-full mb-4" style="padding: 1rem;">Create Account</button>
            
            <p class="text-center text-dim" style="font-size: 0.9rem;">Already have an account? <a href="<?php echo URLROOT; ?>/auth/login" class="text-accent" style="font-weight: 600;">Sign In</a></p>
        </form>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
