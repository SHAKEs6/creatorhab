<?php require APPROOT . '/views/templates/header.php'; ?>

<section class="section" style="padding-top: 8rem; min-height: 90vh;">
    <div class="container" style="max-width: 600px;">
        <div class="mb-5">
            <h2 class="text-gradient">Upload Resource</h2>
            <p class="text-dim">Add a new downloadable asset for creators</p>
        </div>

        <div class="card glass-card" style="padding: 3rem;">
            <form action="<?php echo URLROOT; ?>/admin/add_resource" method="POST">
                <div class="form-group mb-4">
                    <label style="display: block; margin-bottom: 0.8rem; font-weight: 600;">Resource Title</label>
                    <input type="text" name="title" class="form-control" style="width: 100%; padding: 1rem; background: rgba(0,0,0,0.3); border: 1px solid var(--border-color); color: white; border-radius: 12px;" placeholder="e.g. Viral Script Template" required>
                </div>

                <div class="form-group mb-4">
                    <label style="display: block; margin-bottom: 0.8rem; font-weight: 600;">Category</label>
                    <select name="category" class="form-control" style="width: 100%; padding: 1rem; background: rgba(0,0,0,0.3); border: 1px solid var(--border-color); color: white; border-radius: 12px;">
                        <option value="Strategy">Strategy</option>
                        <option value="Design">Visual Assets</option>
                        <option value="Productivity">Productivity</option>
                    </select>
                </div>

                <div class="form-group mb-5">
                    <label style="display: block; margin-bottom: 0.8rem; font-weight: 600;">Description</label>
                    <textarea name="description" class="form-control" style="width: 100%; padding: 1rem; background: rgba(0,0,0,0.3); border: 1px solid var(--border-color); color: white; border-radius: 12px; height: 100px;" placeholder="What's included in this resource?" required></textarea>
                </div>

                <div class="flex" style="gap: 1.5rem;">
                    <button type="submit" class="btn btn-primary" style="flex: 2;">Upload Asset</button>
                    <a href="<?php echo URLROOT; ?>/admin/resources" class="btn btn-outline" style="flex: 1; text-align: center;">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
