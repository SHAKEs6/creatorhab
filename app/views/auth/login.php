<?php require APPROOT . '/views/templates/header.php'; ?>

<section class="section" style="padding-top: 8rem; min-height: 90vh; display: flex; align-items: center; justify-content: center; background: radial-gradient(circle at 10% 20%, rgba(255, 0, 0, 0.05) 0%, transparent 50%);">
    <div class="card glass-card hover-up" style="max-width: 450px; width: 100%; padding: 3rem; border: 1px solid rgba(255,255,255,0.1); border-top: 3px solid var(--accent-red);">
        <div class="text-center mb-5">
            <h2 class="text-gradient">Welcome Back</h2>
            <p class="text-dim">Log in to your creator HQ</p>
        </div>
        
        <form action="<?php echo URLROOT; ?>/auth/login" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo csrf_token(); ?>">
            
            <div class="form-group mb-4">
                <label for="email" style="display: block; margin-bottom: 0.8rem; font-size: 0.9rem; color: var(--text-dim); font-weight: 500;">Email Address</label>
                <div style="position: relative;">
                    <i class="fa-solid fa-envelope" style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: var(--accent-red); opacity: 0.6;"></i>
                    <input type="email" name="email" class="form-control" style="width: 100%; padding: 1rem 1rem 1rem 3rem; background: rgba(0,0,0,0.3); border: 1px solid var(--border-color); color: white; border-radius: 12px; transition: 0.3s; <?php echo (!empty($data['email_err'])) ? 'border-color: var(--accent-red);' : ''; ?>" value="<?php echo htmlspecialchars($data['email']); ?>" placeholder="name@example.com">
                </div>
                <span class="error-msg" style="color: var(--accent-red); font-size: 0.75rem; display: block; margin-top: 0.5rem;"><?php echo $data['email_err']; ?></span>
            </div>
            
            <div class="form-group mb-4">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.8rem;">
                    <label for="password" style="font-size: 0.9rem; color: var(--text-dim); font-weight: 500;">Password</label>
                    <a href="#" style="font-size: 0.8rem; color: var(--accent-red);">Forgot?</a>
                </div>
                <div style="position: relative;">
                    <i class="fa-solid fa-lock" style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: var(--accent-red); opacity: 0.6;"></i>
                    <input type="password" name="password" class="form-control" style="width: 100%; padding: 1rem 1rem 1rem 3rem; background: rgba(0,0,0,0.3); border: 1px solid var(--border-color); color: white; border-radius: 12px; transition: 0.3s; <?php echo (!empty($data['password_err'])) ? 'border-color: var(--accent-red);' : ''; ?>" placeholder="••••••••">
                </div>
                <span class="error-msg" style="color: var(--accent-red); font-size: 0.75rem; display: block; margin-top: 0.5rem;"><?php echo $data['password_err']; ?></span>
            </div>
            
            <button type="submit" class="btn btn-primary btn-full mb-4" style="padding: 1rem; font-size: 1.1rem;">Login to Dashboard</button>
            
            <div class="text-center">
                <p class="text-dim" style="font-size: 0.9rem;">New to CreatorHub? <a href="<?php echo URLROOT; ?>/auth/register" class="text-accent" style="font-weight: 600;">Join Now</a></p>
            </div>
        </form>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
