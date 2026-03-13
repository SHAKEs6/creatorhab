<?php require APPROOT . '/views/templates/header.php'; ?>

<section class="section" style="padding-top: 8rem; min-height: 90vh;">
    <div class="container" style="max-width: 700px;">
        <div class="mb-5">
            <h2 class="text-gradient">Send Notification</h2>
            <p class="text-dim">Notify a specific user or group</p>
        </div>

        <div class="card glass-card" style="padding: 3rem;">
            <form action="<?php echo URLROOT; ?>/admin/send_notification" method="POST">
                <input type="hidden" name="csrf_token" value="<?php echo csrf_token(); ?>">
                
                <div class="form-group mb-4">
                    <label style="display: block; margin-bottom: 0.8rem; font-weight: 600;">User ID</label>
                    <input type="number" name="user_id" class="form-control" style="width: 100%; padding: 1rem; background: rgba(0,0,0,0.3); border: 1px solid var(--border-color); color: white; border-radius: 12px;" placeholder="e.g. 2" required>
                </div>

                <div class="form-group mb-4">
                    <label style="display: block; margin-bottom: 0.8rem; font-weight: 600;">Notification Title</label>
                    <input type="text" name="title" class="form-control" style="width: 100%; padding: 1rem; background: rgba(0,0,0,0.3); border: 1px solid var(--border-color); color: white; border-radius: 12px;" placeholder="e.g. Course Available" required>
                </div>

                <div class="form-group mb-4">
                    <label style="display: block; margin-bottom: 0.8rem; font-weight: 600;">Message</label>
                    <textarea name="message" class="form-control" style="width: 100%; padding: 1rem; background: rgba(0,0,0,0.3); border: 1px solid var(--border-color); color: white; border-radius: 12px; min-height: 150px;" placeholder="Enter notification message..." required></textarea>
                </div>

                <div class="flex" style="gap: 1rem; margin-top: 2rem;">
                    <button type="submit" class="btn btn-primary" style="flex: 1;">Send</button>
                    <a href="<?php echo URLROOT; ?>/admin" class="btn btn-outline" style="flex: 1; text-align: center;">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
