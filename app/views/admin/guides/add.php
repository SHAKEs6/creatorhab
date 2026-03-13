<?php require APPROOT . '/views/templates/header.php'; ?>

<section class="section" style="padding-top: 8rem; min-height: 90vh;">
    <div class="container" style="max-width: 800px;">
        <div class="mb-5">
            <h2 class="text-gradient">Add New Guide</h2>
            <p class="text-dim">Publish new educational content for the platform</p>
        </div>

        <div class="card glass-card" style="padding: 3rem;">
            <form action="<?php echo URLROOT; ?>/admin/add_guide" method="POST">
                <div class="form-group mb-4">
                    <label style="display: block; margin-bottom: 0.8rem; font-weight: 600;">Guide Title</label>
                    <input type="text" name="title" class="form-control" style="width: 100%; padding: 1rem; background: rgba(0,0,0,0.3); border: 1px solid var(--border-color); color: white; border-radius: 12px;" placeholder="e.g. Perfect Niche Selection" required>
                </div>

                <div class="grid grid-2 mb-4">
                    <div class="form-group">
                        <label style="display: block; margin-bottom: 0.8rem; font-weight: 600;">Category</label>
                        <select name="category" class="form-control" style="width: 100%; padding: 1rem; background: rgba(0,0,0,0.3); border: 1px solid var(--border-color); color: white; border-radius: 12px;">
                            <option value="Setup">Setup</option>
                            <option value="Growth">Growth</option>
                            <option value="Monetization">Monetization</option>
                            <option value="Automation">Automation</option>
                        </select>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label style="display: block; margin-bottom: 0.8rem; font-weight: 600;">Short Description</label>
                    <textarea name="description" class="form-control" style="width: 100%; padding: 1rem; background: rgba(0,0,0,0.3); border: 1px solid var(--border-color); color: white; border-radius: 12px; height: 100px;" placeholder="Brief overview of the guide..." required></textarea>
                </div>

                <div class="form-group mb-5">
                    <label style="display: block; margin-bottom: 0.8rem; font-weight: 600;">Full Content (Markdown/HTML with YouTube Links)</label>
                    <div style="font-size: 0.85rem; color: var(--text-dim); margin-bottom: 0.8rem; padding: 1rem; background: rgba(255,0,0,0.05); border-left: 3px solid var(--accent-red); border-radius: 4px;">
                        💡 <strong>Add YouTube Videos:</strong> Use <code style="background: rgba(255,255,255,0.1); padding: 0.2rem 0.4rem; border-radius: 3px;">https://youtube.com/embed/VIDEO_ID</code> to embed videos<br>
                        📝 You can also use Markdown or HTML formatting
                    </div>
                    <textarea name="content" class="form-control" style="width: 100%; padding: 1rem; background: rgba(0,0,0,0.3); border: 1px solid var(--border-color); color: white; border-radius: 12px; height: 300px; font-family: monospace;" placeholder="Write the full guide here... Add YouTube links to embed videos." required></textarea>
                </div>

                <div class="flex" style="gap: 1.5rem;">
                    <button type="submit" class="btn btn-primary" style="flex: 2;">Publish Guide</button>
                    <a href="<?php echo URLROOT; ?>/admin/guides" class="btn btn-outline" style="flex: 1; text-align: center;">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
