<?php require APPROOT . '/views/templates/header.php'; ?>

<section class="section" style="padding-top: 8rem; min-height: 90vh;">
    <div class="container">
        <div class="mb-5 flex flex-between">
            <div>
                <h2 class="text-gradient">Guides Management</h2>
                <p class="text-dim">Create and edit educational content</p>
            </div>
            <div class="flex" style="gap: 1rem;">
                <a href="<?php echo URLROOT; ?>/admin" class="btn btn-outline">Back to HQ</a>
                <a href="<?php echo URLROOT; ?>/admin/add_guide" class="btn btn-primary">Add New Guide</a>
            </div>
        </div>

        <div class="card glass-card">
            <?php if(empty($data['guides'])) : ?>
                <div class="text-center" style="padding: 3rem;">
                    <p class="text-dim">No guides found. Create your first one!</p>
                </div>
            <?php else : ?>
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="border-bottom: 1px solid var(--border-color); text-align: left;">
                            <th style="padding: 1.5rem;">Title</th>
                            <th style="padding: 1.5rem;">Category</th>
                            <th style="padding: 1.5rem;">Created</th>
                            <th style="padding: 1.5rem;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data['guides'] as $guide) : ?>
                        <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                            <td style="padding: 1.5rem; font-weight: 600;"><?php echo $guide->title; ?></td>
                            <td style="padding: 1.5rem;">
                                <span class="badge" style="background: rgba(255,255,255,0.1);"><?php echo $guide->category; ?></span>
                            </td>
                            <td style="padding: 1.5rem;" class="text-dim"><?php echo date('M d, Y', strtotime($guide->created_at)); ?></td>
                            <td style="padding: 1.5rem;">
                                <div class="flex" style="gap: 1rem;">
                                    <a href="<?php echo URLROOT; ?>/admin/edit_guide/<?php echo $guide->id; ?>" style="color: #00cec9; cursor: pointer;" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form method="POST" action="<?php echo URLROOT; ?>/admin/delete_guide/<?php echo $guide->id; ?>" style="display: inline;" onsubmit="return confirm('Are you sure?');">
                                        <button type="submit" style="background: none; border: none; color: var(--accent-red); cursor: pointer; font-size: 1rem;" title="Delete"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
