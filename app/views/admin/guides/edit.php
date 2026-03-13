<?php require APPROOT . '/views/templates/header.php'; ?>

<section class="section" style="padding-top: 8rem; min-height: 90vh;">
    <div class="container">
        <div class="mb-5">
            <h2 class="text-gradient">Edit Guide</h2>
            <p class="text-dim">Update guide content and information</p>
        </div>

        <div class="card glass-card" style="max-width: 800px; margin: 0 auto;">
            <form method="POST">
                <div class="form-group">
                    <label for="title" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Guide Title</label>
                    <input type="text" id="title" name="title" value="<?php echo $data['title']; ?>" 
                        style="width: 100%; padding: 0.75rem; background: rgba(255,255,255,0.05); border: 1px solid var(--border-color); border-radius: var(--radius-sm); color: white; font-size: 1rem;">
                    <?php if(!empty($data['title_err'])) : ?>
                        <span style="color: var(--accent-red); font-size: 0.9rem;">* <?php echo $data['title_err']; ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group" style="margin-top: 1.5rem;">
                    <label for="description" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Brief Description</label>
                    <input type="text" id="description" name="description" value="<?php echo $data['description']; ?>" 
                        style="width: 100%; padding: 0.75rem; background: rgba(255,255,255,0.05); border: 1px solid var(--border-color); border-radius: var(--radius-sm); color: white; font-size: 1rem;">
                    <?php if(!empty($data['description_err'])) : ?>
                        <span style="color: var(--accent-red); font-size: 0.9rem;">* <?php echo $data['description_err']; ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group" style="margin-top: 1.5rem;">
                    <label for="category" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Category</label>
                    <select id="category" name="category" 
                        style="width: 100%; padding: 0.75rem; background: rgba(255,255,255,0.05); border: 1px solid var(--border-color); border-radius: var(--radius-sm); color: white; font-size: 1rem;">
                        <option value="start" <?php if($data['category'] === 'start') echo 'selected'; ?>>Getting Started</option>
                        <option value="growth" <?php if($data['category'] === 'growth') echo 'selected'; ?>>Channel Growth</option>
                        <option value="monetization" <?php if($data['category'] === 'monetization') echo 'selected'; ?>>Monetization</option>
                        <option value="automation" <?php if($data['category'] === 'automation') echo 'selected'; ?>>Automation</option>
                    </select>
                </div>

                <div class="form-group" style="margin-top: 1.5rem;">
                    <label for="content" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Full Content (Markdown/HTML with YouTube Links)</label>
                    <div style="font-size: 0.85rem; color: var(--text-dim); margin-bottom: 0.5rem;">
                        💡 Tip: Add YouTube videos by using: <code style="background: rgba(255,255,255,0.1); padding: 0.2rem 0.4rem; border-radius: 3px;">https://youtube.com/embed/VIDEO_ID</code>
                    </div>
                    <textarea id="content" name="content" rows="15" placeholder="Write your guide content here... Use Markdown or HTML. Add YouTube links to embed videos."
                        style="width: 100%; padding: 0.75rem; background: rgba(255,255,255,0.05); border: 1px solid var(--border-color); border-radius: var(--radius-sm); color: white; font-size: 1rem; font-family: monospace; resize: vertical;"><?php echo $data['content']; ?></textarea>
                    <?php if(!empty($data['content_err'])) : ?>
                        <span style="color: var(--accent-red); font-size: 0.9rem;">* <?php echo $data['content_err']; ?></span>
                    <?php endif; ?>
                </div>

                <div class="flex" style="gap: 1rem; margin-top: 2rem;">
                    <a href="<?php echo URLROOT; ?>/admin/guides" class="btn btn-outline">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Guide</button>
                </div>
            </form>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
