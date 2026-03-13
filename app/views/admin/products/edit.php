<?php require APPROOT . '/views/templates/header.php'; ?>

<section class="section" style="padding-top: 8rem; min-height: 90vh;">
    <div class="container" style="max-width: 800px;">
        <div class="mb-5">
            <h2 class="text-gradient">Edit Product</h2>
            <p class="text-dim">Update marketplace product information</p>
        </div>

        <div class="card glass-card" style="padding: 3rem;">
            <form method="POST">
                <div class="form-group mb-4">
                    <label style="display: block; margin-bottom: 0.8rem; font-weight: 600;">Product Name</label>
                    <input type="text" name="name" value="<?php echo $data['name']; ?>" class="form-control" style="width: 100%; padding: 1rem; background: rgba(0,0,0,0.3); border: 1px solid var(--border-color); color: white; border-radius: 12px;" placeholder="e.g. Monetized YouTube Channel" required>
                    <?php if(!empty($data['name_err'])) : ?>
                        <span style="color: var(--accent-red); font-size: 0.9rem;">* <?php echo $data['name_err']; ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group mb-4">
                    <label style="display: block; margin-bottom: 0.8rem; font-weight: 600;">Description</label>
                    <textarea name="description" class="form-control" style="width: 100%; padding: 1rem; background: rgba(0,0,0,0.3); border: 1px solid var(--border-color); color: white; border-radius: 12px; height: 120px;" placeholder="Describe your product..."><?php echo $data['description']; ?></textarea>
                </div>

                <div class="grid grid-2 mb-4">
                    <div class="form-group">
                        <label style="display: block; margin-bottom: 0.8rem; font-weight: 600;">Price (KSH)</label>
                        <input type="number" name="price" value="<?php echo $data['price']; ?>" class="form-control" style="width: 100%; padding: 1rem; background: rgba(0,0,0,0.3); border: 1px solid var(--border-color); color: white; border-radius: 12px;" placeholder="0" required>
                        <?php if(!empty($data['price_err'])) : ?>
                            <span style="color: var(--accent-red); font-size: 0.9rem;">* <?php echo $data['price_err']; ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label style="display: block; margin-bottom: 0.8rem; font-weight: 600;">Category</label>
                        <select name="category" class="form-control" style="width: 100%; padding: 1rem; background: rgba(0,0,0,0.3); border: 1px solid var(--border-color); color: white; border-radius: 12px;">
                            <option value="Channel" <?php if($data['category'] === 'Channel') echo 'selected'; ?>>YouTube Channel</option>
                            <option value="Course" <?php if($data['category'] === 'Course') echo 'selected'; ?>>Course</option>
                            <option value="Service" <?php if($data['category'] === 'Service') echo 'selected'; ?>>Service</option>
                        </select>
                    </div>
                </div>

                <div class="flex" style="gap: 1.5rem;">
                    <button type="submit" class="btn btn-primary" style="flex: 2;">Update Product</button>
                    <a href="<?php echo URLROOT; ?>/admin/products" class="btn btn-outline" style="flex: 1; text-align: center;">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
