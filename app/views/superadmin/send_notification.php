<?php require APPROOT . '/views/templates/header.php'; ?>

<section class="section" style="padding-top: 8rem; min-height: 90vh;">
    <div class="container" style="max-width: 700px;">
        <div class="mb-5">
            <h2 class="text-gradient">Broadcast Notification</h2>
            <p class="text-dim">Send notifications to platform users</p>
        </div>

        <div class="card glass-card" style="padding: 3rem;">
            <form action="<?php echo URLROOT; ?>/superadmin/send_notification" method="POST">
                <input type="hidden" name="csrf_token" value="<?php echo csrf_token(); ?>">
                
                <div class="form-group mb-4">
                    <label style="display: block; margin-bottom: 0.8rem; font-weight: 600;">Send To</label>
                    <select name="recipient_type" class="form-control" style="width: 100%; padding: 1rem; background: rgba(0,0,0,0.3); border: 1px solid var(--border-color); color: white; border-radius: 12px;" required>
                        <option value="" selected>Choose recipients</option>
                        <option value="all">All Users</option>
                        <option value="admins">Admins Only</option>
                        <option value="users">Regular Users Only</option>
                    </select>
                </div>

                <div class="form-group mb-4">
                    <label style="display: block; margin-bottom: 0.8rem; font-weight: 600;">Notification Title</label>
                    <input type="text" name="title" class="form-control" style="width: 100%; padding: 1rem; background: rgba(0,0,0,0.3); border: 1px solid var(--border-color); color: white; border-radius: 12px;" placeholder="e.g. System Update" required>
                </div>

                <div class="form-group mb-4">
                    <label style="display: block; margin-bottom: 0.8rem; font-weight: 600;">Message</label>
                    <textarea name="message" class="form-control" style="width: 100%; padding: 1rem; background: rgba(0,0,0,0.3); border: 1px solid var(--border-color); color: white; border-radius: 12px; min-height: 150px;" placeholder="Enter your notification message..." required></textarea>
                </div>

                <div class="flex" style="gap: 1rem; margin-top: 2rem;">
                    <button type="submit" class="btn btn-primary" style="flex: 1;">Send Notification</button>
                    <a href="<?php echo URLROOT; ?>/superadmin" class="btn btn-outline" style="flex: 1; text-align: center;">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
