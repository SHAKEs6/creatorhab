<?php require APPROOT . '/views/templates/header.php'; ?>

<section class="section" style="padding-top: 8rem; min-height: 90vh;">
    <div class="container">
        <div class="section-header mb-5">
            <span class="badge" style="background: var(--accent-red); color: white;">Super Admin Privilege</span>
            <h2 class="mt-2 text-gradient">System Overview</h2>
            <p class="text-dim">Full control over users, roles, and site configuration</p>
        </div>

        <div class="grid grid-2 mb-5">
            <div class="card glass-card text-center" style="padding: 3rem;">
                <i class="fa-solid fa-users" style="font-size: 3rem; color: var(--accent-red); margin-bottom: 1.5rem;"></i>
                <h3 style="font-size: 2.5rem;"><?php echo $data['users_count']; ?></h3>
                <p class="text-dim">Total Platform Users</p>
            </div>
            <div class="card glass-card text-center" style="padding: 3rem;">
                <i class="fa-solid fa-user-shield" style="font-size: 3rem; color: #00cec9; margin-bottom: 1.5rem;"></i>
                <h3 style="font-size: 2.5rem;"><?php echo $data['admins_count']; ?></h3>
                <p class="text-dim">Active Administrators</p>
            </div>
        </div>

        <div class="card glass-card" style="padding: 2rem;">
            <h3 class="mb-4">Administrative Tools</h3>
            <div class="grid grid-3" style="gap: 1.5rem;">
                <a href="<?php echo URLROOT; ?>/superadmin/users" class="card hover-up text-center" style="padding: 2rem; background: rgba(255,255,255,0.05); border: 1px solid var(--border-color); border-radius: 12px; display: block;">
                    <i class="fa-solid fa-user-gear mb-3" style="font-size: 2rem; color: var(--accent-red);"></i>
                    <h4>User Mgmt</h4>
                </a>
                <a href="#" class="card hover-up text-center" style="padding: 2rem; background: rgba(255,255,255,0.05); border: 1px solid var(--border-color); border-radius: 12px; display: block;">
                    <i class="fa-solid fa-shield-halved mb-3" style="font-size: 2rem; color: #00cec9;"></i>
                    <h4>Access Logs</h4>
                </a>
                <a href="#" class="card hover-up text-center" style="padding: 2rem; background: rgba(255,255,255,0.05); border: 1px solid var(--border-color); border-radius: 12px; display: block;">
                    <i class="fa-solid fa-gears mb-3" style="font-size: 2rem; color: #f1c40f;"></i>
                    <h4>Site Config</h4>
                </a>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
