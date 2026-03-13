<?php require APPROOT . '/views/templates/header.php'; ?>

<section class="section" style="padding-top: 8rem; min-height: 80vh;">
    <div class="container" style="max-width: 1200px; margin: 0 auto;">
        <div class="section-header mb-5">
            <h2 class="text-gradient">Manage Users</h2>
            <p class="text-dim">View, update roles, and manage platform users</p>
        </div>

        <?php if(isset($_SESSION['success'])): ?>
            <div class="alert alert-success" style="background: rgba(76,222,128,0.1); padding: 1rem; margin-bottom: 2rem; border-left: 4px solid #4ade80; border-radius: 8px;">
                <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>

        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-error" style="background: rgba(255,0,0,0.1); padding: 1rem; margin-bottom: 2rem; border-left: 4px solid #ff0000; border-radius: 8px;">
                <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <!-- Users Table -->
        <div class="card glass-card" style="padding: 2rem; overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="border-bottom: 2px solid rgba(255,255,255,0.1);">
                        <th style="padding: 1rem; text-align: left; font-weight: 600;">ID</th>
                        <th style="padding: 1rem; text-align: left; font-weight: 600;">Name</th>
                        <th style="padding: 1rem; text-align: left; font-weight: 600;">Email</th>
                        <th style="padding: 1rem; text-align: left; font-weight: 600;">Role</th>
                        <th style="padding: 1rem; text-align: left; font-weight: 600;">Joined</th>
                        <th style="padding: 1rem; text-align: left; font-weight: 600;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['users'] as $user): ?>
                        <tr style="border-bottom: 1px solid rgba(255,255,255,0.05); hover: background: rgba(255,255,255,0.02);">
                            <td style="padding: 1rem;"><?php echo $user->id; ?></td>
                            <td style="padding: 1rem;">
                                <strong><?php echo htmlspecialchars($user->name); ?></strong>
                            </td>
                            <td style="padding: 1rem; font-size: 0.9rem;">
                                <span style="background: rgba(255,255,255,0.05); padding: 0.3rem 0.8rem; border-radius: 4px;">
                                    <?php echo htmlspecialchars($user->email); ?>
                                </span>
                            </td>
                            <td style="padding: 1rem;">
                                <form method="POST" action="<?php echo URLROOT; ?>/admin-users/updateRole" style="display: flex; gap: 0.5rem;">
                                    <input type="hidden" name="user_id" value="<?php echo $user->id; ?>">
                                    <select name="role" style="padding: 0.4rem; background: rgba(255,255,255,0.05); color: white; border: 1px solid rgba(255,255,255,0.1); border-radius: 4px; font-size: 0.9rem;">
                                        <option value="user" <?php echo $user->role === 'user' ? 'selected' : ''; ?>>User</option>
                                        <option value="admin" <?php echo $user->role === 'admin' ? 'selected' : ''; ?>>Admin</option>
                                        <option value="super_admin" <?php echo $user->role === 'super_admin' ? 'selected' : ''; ?>>Super Admin</option>
                                    </select>
                                    <button type="submit" class="btn btn-sm" style="background: #4ade80; color: #111; padding: 0.4rem 1rem; font-size: 0.8rem;">Update</button>
                                </form>
                            </td>
                            <td style="padding: 1rem; font-size: 0.85rem;">
                                <?php echo date('M d, Y', strtotime($user->created_at)); ?>
                            </td>
                            <td style="padding: 1rem;">
                                <?php if($user->id != $_SESSION['user_id']): ?>
                                    <a href="<?php echo URLROOT; ?>/admin-users/deleteUser/<?php echo $user->id; ?>" 
                                       class="btn btn-outline btn-sm" style="color: #ff6b6b; font-size: 0.8rem;"
                                       onclick="return confirm('Delete this user? This cannot be undone.')">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </a>
                                <?php else: ?>
                                    <span class="text-dim" style="font-size: 0.8rem;">(You)</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div style="margin-top: 2rem; text-align: center;">
            <a href="<?php echo URLROOT; ?>/admin" class="btn btn-outline">Back to Admin</a>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
