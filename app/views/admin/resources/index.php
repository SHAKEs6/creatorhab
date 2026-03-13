<?php require APPROOT . '/views/templates/header.php'; ?>

<section class="section" style="padding-top: 8rem; min-height: 90vh;">
    <div class="container">
        <div class="mb-5 flex flex-between">
            <div>
                <h2 class="text-gradient">Resource Library</h2>
                <p class="text-dim">Manage downloadable templates and assets</p>
            </div>
            <div class="flex" style="gap: 1rem;">
                <a href="<?php echo URLROOT; ?>/admin" class="btn btn-outline">Back to HQ</a>
                <a href="<?php echo URLROOT; ?>/admin/add_resource" class="btn btn-primary">Upload Resource</a>
            </div>
        </div>

        <div class="card glass-card">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="border-bottom: 1px solid var(--border-color); text-align: left;">
                        <th style="padding: 1.5rem;">Title</th>
                        <th style="padding: 1.5rem;">Category</th>
                        <th style="padding: 1.5rem;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['resources'] as $resource) : ?>
                    <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                        <td style="padding: 1.5rem; font-weight: 600;"><?php echo $resource->title; ?></td>
                        <td style="padding: 1.5rem;"><span class="badge"><?php echo $resource->category; ?></span></td>
                        <td style="padding: 1.5rem;">
                            <div class="flex" style="gap: 1rem;">
                                <a href="<?php echo URLROOT; ?>/admin/edit_resource/<?php echo $resource->id; ?>" style="color: #00cec9; cursor: pointer;" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form method="POST" action="<?php echo URLROOT; ?>/admin/delete_resource/<?php echo $resource->id; ?>" style="display: inline;" onsubmit="return confirm('Are you sure?');">
                                    <button type="submit" style="background: none; border: none; color: var(--accent-red); cursor: pointer; font-size: 1rem;" title="Delete"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
