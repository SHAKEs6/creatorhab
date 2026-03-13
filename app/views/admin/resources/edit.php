<?php require APPROOT . '/views/templates/header.php'; ?>

<section class="section" style="padding-top: 8rem; min-height: 90vh;">
    <div class="container" style="max-width: 800px;">
        <div class="mb-5">
            <h2 class="text-gradient">Edit Resource</h2>
            <p class="text-dim">Update resource information</p>
        </div>

        <div class="card glass-card" style="padding: 3rem;">
            <form method="POST">
                <div class="form-group mb-4">
                    <label style="display: block; margin-bottom: 0.8rem; font-weight: 600;">Resource Title</label>
                    <input type="text" name="title" value="<?php echo $data['title']; ?>" class="form-control" style="width: 100%; padding: 1rem; background: rgba(0,0,0,0.3); border: 1px solid var(--border-color); color: white; border-radius: 12px;" placeholder="e.g. YouTube SEO Checklist" required>
                    <?php if(!empty($data['title_err'])) : ?>
                        <span style="color: var(--accent-red); font-size: 0.9rem;">* <?php echo $data['title_err']; ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group mb-4">
                    <label style="display: block; margin-bottom: 0.8rem; font-weight: 600;">Description</label>
                    <textarea name="description" class="form-control" style="width: 100%; padding: 1rem; background: rgba(0,0,0,0.3); border: 1px solid var(--border-color); color: white; border-radius: 12px; height: 100px;" placeholder="Describe this resource..."><?php echo $data['description']; ?></textarea>
                </div>

                <div class="form-group mb-4">
                    <label style="display: block; margin-bottom: 0.8rem; font-weight: 600;">Category</label>
                    <select name="category" class="form-control" style="width: 100%; padding: 1rem; background: rgba(0,0,0,0.3); border: 1px solid var(--border-color); color: white; border-radius: 12px;">
                        <option value="Template" <?php if($data['category'] === 'Template') echo 'selected'; ?>>Template</option>
                        <option value="Guide" <?php if($data['category'] === 'Guide') echo 'selected'; ?>>Guide</option>
                        <option value="Tool" <?php if($data['category'] === 'Tool') echo 'selected'; ?>>Tool</option>
                        <option value="Other" <?php if($data['category'] === 'Other') echo 'selected'; ?>>Other</option>
                    </select>
                </div>

                <div class="flex" style="gap: 1.5rem;">
                    <button type="submit" class="btn btn-primary" style="flex: 2;">Update Resource</button>
                    <a href="<?php echo URLROOT; ?>/admin/resources" class="btn btn-outline" style="flex: 1; text-align: center;">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
