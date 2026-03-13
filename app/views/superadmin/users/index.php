<?php require APPROOT . '/views/templates/header.php'; ?>

<section class="section" style="padding-top: 8rem; min-height: 90vh;">
    <div class="container">
        <div class="mb-5 flex flex-between">
            <div>
                <h2 class="text-gradient">User Management</h2>
                <p class="text-dim">Assign roles and manage access levels</p>
            </div>
            <a href="<?php echo URLROOT; ?>/superadmin" class="btn btn-outline">Back to Dashboard</a>
        </div>

        <div class="card glass-card" style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; min-width: 800px;">
                <thead>
                    <tr style="border-bottom: 1px solid var(--border-color); text-align: left;">
                        <th style="padding: 1.5rem;">User</th>
                        <th style="padding: 1.5rem;">Email</th>
                        <th style="padding: 1.5rem;">Role</th>
                        <th style="padding: 1.5rem;">Joined</th>
                        <th style="padding: 1.5rem;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['users'] as $user) : ?>
                    <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                        <td style="padding: 1.5rem; font-weight: 600;"><?php echo $user->name; ?></td>
                        <td style="padding: 1.5rem;" class="text-dim"><?php echo $user->email; ?></td>
                        <td style="padding: 1.5rem;">
                            <span class="badge" style="<?php echo ($user->role === 'super_admin') ? 'background: var(--accent-red);' : (($user->role === 'admin') ? 'background: #00cec9;' : 'background: rgba(255,255,255,0.1);'); ?> color: white;">
                                <?php echo strtoupper($user->role); ?>
                            </span>
                        </td>
                        <td style="padding: 1.5rem;" class="text-dim"><?php echo date('M d, Y', strtotime($user->created_at)); ?></td>
                        <td style="padding: 1.5rem;">
                            <div class="flex" style="gap: 1rem;">
                                <form action="<?php echo URLROOT; ?>/superadmin/update_role/<?php echo $user->id; ?>" method="POST">
                                    <select name="role" onchange="this.form.submit()" style="background: rgba(0,0,0,0.5); border: 1px solid var(--border-color); color: white; padding: 0.5rem; border-radius: 8px;">
                                        <option value="user" <?php echo ($user->role === 'user') ? 'selected' : ''; ?>>User</option>
                                        <option value="admin" <?php echo ($user->role === 'admin') ? 'selected' : ''; ?>>Admin</option>
                                        <option value="super_admin" <?php echo ($user->role === 'super_admin') ? 'selected' : ''; ?>>Super Admin</option>
                                    </select>
                                </form>
                                <?php if($user->id !== $_SESSION['user_id']) : ?>
                                <form action="<?php echo URLROOT; ?>/superadmin/delete_user/<?php echo $user->id; ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                    <button type="submit" style="background: none; border: none; color: var(--accent-red); cursor: pointer;">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                                <?php endif; ?>
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
