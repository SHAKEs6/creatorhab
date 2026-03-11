<?php require APPROOT . '/views/templates/header.php'; ?>

<section class="section section-dark" style="padding-top: 8rem; min-height: 100vh;">
    <div class="grid" style="grid-template-columns: 250px 1fr; gap: 2rem;">
        
        <!-- Sidebar Navigation -->
        <aside class="glass-panel" style="padding: 2rem 1rem;">
            <div class="text-center mb-3">
                <div style="width: 80px; height: 80px; border-radius: 50%; background: var(--bg-card); display: inline-flex; align-items: center; justify-content: center; font-size: 2rem; color: var(--accent-red); margin-bottom: 1rem;"><i class="fa-solid fa-user"></i></div>
                <h4><?php echo htmlspecialchars($data['user']['name']); ?></h4>
                <div class="badge" style="margin-top: 0.5rem; font-size: 0.7rem;"><?php echo strtoupper($data['user']['role']); ?></div>
            </div>
            
            <ul style="display: flex; flex-direction: column; gap: 0.5rem; margin-top: 2rem;">
                <li><a href="<?php echo URLROOT; ?>/dashboard" class="btn btn-outline btn-full" style="justify-content: flex-start; border-color: var(--accent-red); color: var(--accent-red); background: rgba(255,0,0,0.1);"><i class="fa-solid fa-chart-pie" style="width: 25px;"></i> Overview</a></li>
                <li><a href="#" class="btn btn-outline btn-full" style="justify-content: flex-start; border: none;"><i class="fa-solid fa-graduation-cap" style="width: 25px;"></i> My Courses</a></li>
                <li><a href="#" class="btn btn-outline btn-full" style="justify-content: flex-start; border: none;"><i class="fa-solid fa-store" style="width: 25px;"></i> My Channels</a></li>
                <li><a href="#" class="btn btn-outline btn-full" style="justify-content: flex-start; border: none;"><i class="fa-solid fa-wrench" style="width: 25px;"></i> AI Tools</a></li>
                <?php if($data['user']['role'] === 'admin' || $data['user']['role'] === 'super_admin'): ?>
                    <li style="margin-top: 1rem;"><a href="<?php echo URLROOT; ?>/admin" class="btn btn-primary btn-full" style="justify-content: flex-start;"><i class="fa-solid fa-shield-halved" style="width: 25px;"></i> Admin Panel</a></li>
                <?php endif; ?>
            </ul>
        </aside>

        <!-- Main Content -->
        <main>
            <div class="flex" style="align-items: center; justify-content: space-between; margin-bottom: 2rem;">
                <h2>Welcome to your Dashboard</h2>
                <a href="<?php echo URLROOT; ?>/courses" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus"></i> Browse Courses</a>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-3 mb-3">
                <div class="card glass-card">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <p class="text-dim">Enrolled Courses</p>
                            <h3><?php echo $data['stats']['courses']; ?></h3>
                        </div>
                        <i class="fa-solid fa-graduation-cap theme-icon" style="margin: 0; color: var(--accent-red);"></i>
                    </div>
                </div>
                <div class="card glass-card">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <p class="text-dim">Owned Channels</p>
                            <h3><?php echo $data['stats']['channels']; ?></h3>
                        </div>
                        <i class="fa-solid fa-youtube theme-icon" style="margin: 0; color: var(--accent-red);"></i>
                    </div>
                </div>
                <div class="card glass-card">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <p class="text-dim">AI Tools Generated</p>
                            <h3><?php echo $data['stats']['tools_used']; ?></h3>
                        </div>
                        <i class="fa-solid fa-robot theme-icon" style="margin: 0; color: var(--accent-red);"></i>
                    </div>
                </div>
            </div>

            <!-- Recent Activity Placeholder -->
            <div class="card glass-card">
                <h3 class="mb-3">Recent Activity</h3>
                <div style="padding: 2rem; text-align: center; border: 1px dashed var(--border-color); border-radius: var(--radius-sm);">
                    <i class="fa-solid fa-inbox theme-icon" style="color: var(--text-dim); font-size: 3rem;"></i>
                    <p class="text-dim">No recent activity found. Start a course or use a tool to get started!</p>
                </div>
            </div>
        </main>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
