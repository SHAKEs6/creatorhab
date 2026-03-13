<?php require APPROOT . '/views/templates/header.php'; ?>

<div class="dashboard-layout" style="display: flex; min-height: 80vh; padding-top: 6rem;">
    <!-- Sidebar -->
    <aside class="dashboard-sidebar p-lg border-r" style="width: 250px; background: rgba(0,0,0,0.5);">
        <div class="user-profile mb-5 text-center">
            <div class="avatar-circle mx-auto mb-3" style="width: 80px; height: 80px; border-radius: 50%; background: #fbbf24; display: flex; justify-content: center; align-items: center; font-size: 2rem; font-weight: bold; color: #111;">
                <i class="fa-solid fa-crown"></i>
            </div>
            <h4><?php echo $data['user']['name']; ?></h4>
            <span class="badge" style="background: #fbbf24; color: #111;">Super Admin</span>
        </div>
        
        <ul class="sidebar-nav" style="list-style: none; padding: 0;">
            <li class="mb-3"><a href="#" class="active" style="display: flex; align-items: center; color: white; text-decoration: none; padding: 0.8rem; background: rgba(255,255,255,0.1); border-radius: var(--radius-sm);"><i class="fa-solid fa-chart-line" style="margin-right: 1rem; width: 20px;"></i> Platform Analytics</a></li>
            <li class="mb-3"><a href="#" style="display: flex; align-items: center; color: var(--text-dim); text-decoration: none; padding: 0.8rem;"><i class="fa-solid fa-money-bill-wave" style="margin-right: 1rem; width: 20px;"></i> Revenue Settings</a></li>
            <li class="mb-3"><a href="#" style="display: flex; align-items: center; color: var(--text-dim); text-decoration: none; padding: 0.8rem;"><i class="fa-solid fa-gear" style="margin-right: 1rem; width: 20px;"></i> System Config</a></li>
            <li><a href="<?php echo URLROOT; ?>/auth/logout" style="display: flex; align-items: center; color: var(--accent-red); text-decoration: none; padding: 0.8rem;"><i class="fa-solid fa-right-from-bracket" style="margin-right: 1rem; width: 20px;"></i> Logout</a></li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="dashboard-main p-lg flex-1">
        <header class="dashboard-header mb-5 flex-row" style="justify-content: space-between; align-items: center;">
            <h2>Super Admin Analytics</h2>
            <div class="date-range badge"><i class="fa-regular fa-calendar"></i> Last 30 Days</div>
        </header>

        <!-- Stats Grid -->
        <div class="grid grid-3 mb-5">
            <div class="card glass-card border-accent">
                <div class="flex-row" style="justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                    <h4 class="text-dim m-0">Total Platform Revenue</h4>
                    <i class="fa-solid fa-vault theme-icon" style="color: #fbbf24; margin: 0;"></i>
                </div>
                <h2 class="m-0">$45,230.50</h2>
                <small style="color: #4ade80;"><i class="fa-solid fa-arrow-up"></i> 8% this month</small>
            </div>
            
            <div class="card glass-card">
                <div class="flex-row" style="justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                    <h4 class="text-dim m-0">Marketplace Fees</h4>
                    <i class="fa-solid fa-store theme-icon" style="color: #60a5fa; margin: 0;"></i>
                </div>
                <h2 class="m-0">$12,450.00</h2>
                <small class="text-dim">From 34 channel sales</small>
            </div>

            <div class="card glass-card">
                <div class="flex-row" style="justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                    <h4 class="text-dim m-0">Course Sales</h4>
                    <i class="fa-solid fa-graduation-cap theme-icon" style="color: #c084fc; margin: 0;"></i>
                </div>
                <h2 class="m-0">$32,780.50</h2>
                <small class="text-dim">412 Enrollments</small>
            </div>
        </div>
        
        <!-- System Status -->
        <div class="card glass-card">
            <h3 class="mb-4"><i class="fa-solid fa-server mt-1"></i> System Status & Database Health</h3>
            <div class="flex-row" style="gap: 2rem;">
                <div class="flex-1" style="background: rgba(255,255,255,0.05); padding: 1.5rem; border-radius: var(--radius-sm);">
                    <div class="flex-row" style="justify-content: space-between; margin-bottom: 1rem;">
                        <span>Server Load CPU</span>
                        <span style="color: #4ade80;">12% Normal</span>
                    </div>
                    <div style="width: 100%; background: rgba(0,0,0,0.5); height: 8px; border-radius: 4px;"><div style="width: 12%; background: #4ade80; height: 100%; border-radius: 4px;"></div></div>
                </div>
                
                <div class="flex-1" style="background: rgba(255,255,255,0.05); padding: 1.5rem; border-radius: var(--radius-sm);">
                    <div class="flex-row" style="justify-content: space-between; margin-bottom: 1rem;">
                        <span>Database Memory (RAM)</span>
                        <span style="color: #facc15;">68% Warning</span>
                    </div>
                    <div style="width: 100%; background: rgba(0,0,0,0.5); height: 8px; border-radius: 4px;"><div style="width: 68%; background: #facc15; height: 100%; border-radius: 4px;"></div></div>
                </div>
            </div>
        </div>
    </main>
</div>

<?php require APPROOT . '/views/templates/footer.php'; ?>
