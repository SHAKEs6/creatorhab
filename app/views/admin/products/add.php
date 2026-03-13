<?php require APPROOT . '/views/templates/header.php'; ?>

<section class="section" style="padding-top: 8rem; min-height: 90vh;">
    <div class="container" style="max-width: 600px;">
        <div class="mb-5">
            <h2 class="text-gradient">Add Marketplace Product</h2>
            <p class="text-dim">List a new channel or digital service for sale</p>
        </div>

        <div class="card glass-card" style="padding: 3rem;">
            <form action="<?php echo URLROOT; ?>/admin/add_product" method="POST">
                <div class="form-group mb-4">
                    <label style="display: block; margin-bottom: 0.8rem; font-weight: 600;">Product Name</label>
                    <input type="text" name="name" class="form-control" style="width: 100%; padding: 1rem; background: rgba(0,0,0,0.3); border: 1px solid var(--border-color); color: white; border-radius: 12px;" placeholder="e.g. Monetized Gaming Channel" required>
                </div>

                <div class="grid grid-2 mb-4">
                    <div class="form-group">
                        <label style="display: block; margin-bottom: 0.8rem; font-weight: 600;">Price (KSH)</label>
                        <input type="number" name="price" class="form-control" style="width: 100%; padding: 1rem; background: rgba(0,0,0,0.3); border: 1px solid var(--border-color); color: white; border-radius: 12px;" placeholder="45000" required>
                    </div>
                    <div class="form-group">
                        <label style="display: block; margin-bottom: 0.8rem; font-weight: 600;">Category</label>
                        <select name="category" class="form-control" style="width: 100%; padding: 1rem; background: rgba(0,0,0,0.3); border: 1px solid var(--border-color); color: white; border-radius: 12px;">
                            <option value="Channels">YouTube Channels</option>
                            <option value="Services">Services</option>
                            <option value="Tools">Creator Tools</option>
                        </select>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label style="display: block; margin-bottom: 0.8rem; font-weight: 600;">Description</label>
                    <textarea name="description" class="form-control" style="width: 100%; padding: 1rem; background: rgba(0,0,0,0.3); border: 1px solid var(--border-color); color: white; border-radius: 12px; height: 120px;" placeholder="Detailed product specifications..." required></textarea>
                </div>

                <div class="flex" style="gap: 1.5rem;">
                    <button type="submit" class="btn btn-primary" style="flex: 2;">List Product</button>
                    <a href="<?php echo URLROOT; ?>/admin/products" class="btn btn-outline" style="flex: 1; text-align: center;">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
