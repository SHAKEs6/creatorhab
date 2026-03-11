<?php require APPROOT . '/views/templates/header.php'; ?>

<section class="section">
    <div class="grid" style="place-items: center; min-height: 80vh;">
        <div class="card glass-card" style="max-width: 500px; width: 100%;">
            <div class="text-center mb-3">
                <h2>Create an Account</h2>
                <p class="text-dim">Join the ultimate creator platform.</p>
            </div>
            
            <form action="<?php echo URLROOT; ?>/auth/register" method="POST">
                <input type="hidden" name="csrf_token" value="<?php echo csrf_token(); ?>">
                
                <div class="form-group" style="margin-bottom: 1.5rem;">
                    <label for="name" style="display: block; margin-bottom: 0.5rem; color: var(--text-dim);">Full Name <sup>*</sup></label>
                    <input type="text" name="name" class="form-control" style="width: 100%; padding: 0.8rem; background: rgba(0,0,0,0.2); border: 1px solid var(--border-color); color: white; border-radius: var(--radius-sm); <?php echo (!empty($data['name_err'])) ? 'border-color: var(--accent-red);' : ''; ?>" value="<?php echo htmlspecialchars($data['name']); ?>">
                    <span style="color: var(--accent-red); font-size: 0.8rem;"><?php echo $data['name_err']; ?></span>
                </div>
                
                <div class="form-group" style="margin-bottom: 1.5rem;">
                    <label for="email" style="display: block; margin-bottom: 0.5rem; color: var(--text-dim);">Email Address <sup>*</sup></label>
                    <input type="email" name="email" class="form-control" style="width: 100%; padding: 0.8rem; background: rgba(0,0,0,0.2); border: 1px solid var(--border-color); color: white; border-radius: var(--radius-sm); <?php echo (!empty($data['email_err'])) ? 'border-color: var(--accent-red);' : ''; ?>" value="<?php echo htmlspecialchars($data['email']); ?>">
                    <span style="color: var(--accent-red); font-size: 0.8rem;"><?php echo $data['email_err']; ?></span>
                </div>
                
                <div class="form-group" style="margin-bottom: 1.5rem;">
                    <label for="password" style="display: block; margin-bottom: 0.5rem; color: var(--text-dim);">Password <sup>*</sup></label>
                    <input type="password" name="password" class="form-control" style="width: 100%; padding: 0.8rem; background: rgba(0,0,0,0.2); border: 1px solid var(--border-color); color: white; border-radius: var(--radius-sm); <?php echo (!empty($data['password_err'])) ? 'border-color: var(--accent-red);' : ''; ?>">
                    <span style="color: var(--accent-red); font-size: 0.8rem;"><?php echo $data['password_err']; ?></span>
                </div>

                <div class="form-group" style="margin-bottom: 2rem;">
                    <label for="confirm_password" style="display: block; margin-bottom: 0.5rem; color: var(--text-dim);">Confirm Password <sup>*</sup></label>
                    <input type="password" name="confirm_password" class="form-control" style="width: 100%; padding: 0.8rem; background: rgba(0,0,0,0.2); border: 1px solid var(--border-color); color: white; border-radius: var(--radius-sm); <?php echo (!empty($data['confirm_password_err'])) ? 'border-color: var(--accent-red);' : ''; ?>">
                    <span style="color: var(--accent-red); font-size: 0.8rem;"><?php echo $data['confirm_password_err']; ?></span>
                </div>
                
                <div class="flex" style="align-items: center; justify-content: space-between;">
                    <button type="submit" class="btn btn-primary" style="flex: 1;">Register</button>
                    <a href="<?php echo URLROOT; ?>/auth/login" class="btn btn-outline" style="flex: 1;">Have an account?</a>
                </div>
            </form>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
