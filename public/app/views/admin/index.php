<?php require APPROOT . '/views/templates/header.php'; ?>

<div class="dashboard-layout" style="display: flex; min-height: 80vh; padding-top: 6rem;">
    <!-- Sidebar -->
    <aside class="dashboard-sidebar p-lg border-r" style="width: 250px; background: rgba(0,0,0,0.5);">
        <div class="user-profile mb-5 text-center">
            <div class="avatar-circle mx-auto mb-3" style="width: 80px; height: 80px; border-radius: 50%; background: var(--accent-red); display: flex; justify-content: center; align-items: center; font-size: 2rem; font-weight: bold;">
                <?php echo strtoupper(substr($data['user']['name'], 0, 1)); ?>
            </div>
            <h4><?php echo $data['user']['name']; ?></h4>
            <span class="badge" style="background: #4ade80; color: #111;">Admin</span>
        </div>
        
        <ul class="sidebar-nav" style="list-style: none; padding: 0;">
            <li class="mb-3"><a href="#" class="active" style="display: flex; align-items: center; color: white; text-decoration: none; padding: 0.8rem; background: rgba(255,255,255,0.1); border-radius: var(--radius-sm);"><i class="fa-solid fa-users" style="margin-right: 1rem; width: 20px;"></i> Manage Users</a></li>
            <li class="mb-3"><a href="#" style="display: flex; align-items: center; color: var(--text-dim); text-decoration: none; padding: 0.8rem;"><i class="fa-solid fa-store" style="margin-right: 1rem; width: 20px;"></i> Approve Channels</a></li>
            <li class="mb-3"><a href="#" style="display: flex; align-items: center; color: var(--text-dim); text-decoration: none; padding: 0.8rem;"><i class="fa-solid fa-graduation-cap" style="margin-right: 1rem; width: 20px;"></i> Course Approvals</a></li>
            <li><a href="<?php echo URLROOT; ?>/auth/logout" style="display: flex; align-items: center; color: var(--accent-red); text-decoration: none; padding: 0.8rem;"><i class="fa-solid fa-right-from-bracket" style="margin-right: 1rem; width: 20px;"></i> Logout</a></li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="dashboard-main p-lg flex-1">
        <header class="dashboard-header mb-5 flex-row" style="justify-content: space-between; align-items: center;">
            <h2>Admin Overview</h2>
            <button class="btn btn-outline btn-sm"><i class="fa-solid fa-download"></i> Export Data</button>
        </header>

        <!-- Stats Grid -->
        <div class="grid grid-3 mb-5">
            <div class="card glass-card">
                <div class="flex-row" style="justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                    <h4 class="text-dim m-0">Total Users</h4>
                    <i class="fa-solid fa-users theme-icon" style="color: #60a5fa; margin: 0;"></i>
                </div>
                <h2 class="m-0">1,245</h2>
                <small style="color: #4ade80;"><i class="fa-solid fa-arrow-up"></i> 12% this month</small>
            </div>
            
            <div class="card glass-card">
                <div class="flex-row" style="justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                    <h4 class="text-dim m-0">Pending Channels</h4>
                    <i class="fa-solid fa-clock theme-icon" style="color: #facc15; margin: 0;"></i>
                </div>
                <h2 class="m-0">34</h2>
                <small class="text-dim">Awaiting review in marketplace</small>
            </div>

            <div class="card glass-card">
                <div class="flex-row" style="justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                    <h4 class="text-dim m-0">Reported Content</h4>
                    <i class="fa-solid fa-flag theme-icon" style="color: var(--accent-red); margin: 0;"></i>
                </div>
                <h2 class="m-0">5</h2>
                <small class="text-dim">Requires immediate action</small>
            </div>
        </div>
        
        <!-- Recent Activity Table Mockup -->
        <div class="card glass-card">
            <h3 class="mb-4">Recent Registrations</h3>
            <div class="table-responsive">
                <table style="width: 100%; text-align: left; border-collapse: collapse;">
                    <thead>
                        <tr style="border-bottom: 1px solid rgba(255,255,255,0.1);">
                            <th style="padding: 1rem 0; color: var(--text-dim);">User</th>
                            <th style="padding: 1rem; color: var(--text-dim);">Email</th>
                            <th style="padding: 1rem; color: var(--text-dim);">Joined</th>
                            <th style="padding: 1rem; text-align: right; color: var(--text-dim);">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                            <td style="padding: 1rem 0; font-weight: bold;">New Creator 1</td>
                            <td style="padding: 1rem; color: var(--text-dim);">creator1@example.com</td>
                            <td style="padding: 1rem;">2 mins ago</td>
                            <td style="padding: 1rem; text-align: right;"><button class="btn btn-outline btn-sm">View</button></td>
                        </tr>
                        <tr>
                            <td style="padding: 1rem 0; font-weight: bold;">Gaming Pro</td>
                            <td style="padding: 1rem; color: var(--text-dim);">gaming@example.com</td>
                            <td style="padding: 1rem;">1 hour ago</td>
                            <td style="padding: 1rem; text-align: right;"><button class="btn btn-outline btn-sm">View</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

<?php require APPROOT . '/views/templates/footer.php'; ?>
