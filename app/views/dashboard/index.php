<?php require APPROOT . '/views/templates/header.php'; ?>

<section class="section section-dark" style="padding-top: 8rem; min-height: 100vh;">
    <div class="container" style="max-width: 1300px;">
        <!-- Header with User Greeting -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 3rem;">
            <div>
                <h1 class="text-gradient">Welcome back, <?php echo htmlspecialchars($data['user']['name']); ?>! 👋</h1>
                <p class="text-dim" style="margin-top: 0.5rem;">Here's your creator dashboard overview</p>
            </div>
            <div class="badge" style="background: var(--accent-red); color: white; padding: 0.8rem 1.5rem; font-size: 0.9rem;"><?php echo strtoupper($data['user']['role']); ?></div>
        </div>

        <!-- Main Grid Layout -->
        <div class="grid" style="grid-template-columns: 300px 1fr; gap: 2rem; margin-bottom: 2rem;">
            
            <!-- Sidebar -->
            <aside>
                <!-- User Profile Card -->
                <div class="card glass-card" style="padding: 2rem; text-align: center; margin-bottom: 2rem;">
                    <div style="width: 100px; height: 100px; border-radius: 50%; background: linear-gradient(135deg, var(--accent-red), #ff6b6b); display: inline-flex; align-items: center; justify-content: center; font-size: 2.5rem; color: white; margin-bottom: 1rem;">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <h4 style="margin: 1rem 0;">Creator Profile</h4>
                    <p class="text-dim" style="font-size: 0.85rem; margin-bottom: 1.5rem;">
                        <?php echo htmlspecialchars($data['user']['email']); ?><br>
                        <span style="font-size: 0.75rem; color: var(--accent-red);">Member since 2024</span>
                    </p>
                    <a href="#" class="btn btn-outline btn-full" style="text-align: center; font-size: 0.9rem;">Edit Profile</a>
                </div>

                <!-- Quick Navigation -->
                <div class="card glass-card" style="padding: 0;">
                    <div style="padding: 1.5rem; border-bottom: 1px solid rgba(255,255,255,0.05);">
                        <h4 style="margin: 0; font-size: 1rem;">Quick Links</h4>
                    </div>
                    <ul style="list-style: none; padding: 0;">
                        <li><a href="<?php echo URLROOT; ?>/guides" class="btn btn-outline" style="width: 100%; justify-content: flex-start; border: none; border-bottom: 1px solid rgba(255,255,255,0.05); border-radius: 0;"><i class="fa-solid fa-book" style="width: 20px;"></i> Learn Guides</a></li>
                        <li><a href="<?php echo URLROOT; ?>/courses" class="btn btn-outline" style="width: 100%; justify-content: flex-start; border: none; border-bottom: 1px solid rgba(255,255,255,0.05); border-radius: 0;"><i class="fa-solid fa-graduation-cap" style="width: 20px;"></i> Browse Courses</a></li>
                        <li><a href="<?php echo URLROOT; ?>/marketplace" class="btn btn-outline" style="width: 100%; justify-content: flex-start; border: none; border-bottom: 1px solid rgba(255,255,255,0.05); border-radius: 0;"><i class="fa-solid fa-store" style="width: 20px;"></i> Buy Channels</a></li>
                        <li><a href="<?php echo URLROOT; ?>/consultation" class="btn btn-outline" style="width: 100%; justify-content: flex-start; border: none; border-radius: 0;"><i class="fa-solid fa-phone" style="width: 20px;"></i> Get Consulting</a></li>
                    </ul>
                </div>

                <!-- Admin Access (if applicable) -->
                <?php if($data['user']['role'] === 'admin' || $data['user']['role'] === 'super_admin'): ?>
                <a href="<?php echo URLROOT; ?>/admin" class="btn btn-primary btn-full" style="margin-top: 1.5rem; text-align: center;">
                    <i class="fa-solid fa-shield-halved"></i> Admin Panel
                </a>
                <?php endif; ?>
            </aside>

            <!-- Main Content -->
            <main>
                <!-- Stats Grid (3 Columns) -->
                <div class="grid grid-3 mb-3">
                    <div class="card glass-card hover-up" style="text-align: center;">
                        <i class="fa-solid fa-graduation-cap" style="font-size: 2.5rem; color: var(--accent-red); margin-bottom: 1rem;"></i>
                        <p class="text-dim">Courses Enrolled</p>
                        <h2 style="margin: 0.5rem 0;"><?php echo $data['stats']['courses']; ?></h2>
                        <a href="<?php echo URLROOT; ?>/courses" style="font-size: 0.85rem; color: var(--accent-red);">View Courses →</a>
                    </div>
                    
                    <div class="card glass-card hover-up" style="text-align: center;">
                        <i class="fa-solid fa-youtube" style="font-size: 2.5rem; color: #ff0000; margin-bottom: 1rem;"></i>
                        <p class="text-dim">Owned Channels</p>
                        <h2 style="margin: 0.5rem 0;"><?php echo $data['stats']['channels']; ?></h2>
                        <a href="<?php echo URLROOT; ?>/marketplace" style="font-size: 0.85rem; color: #ff0000;">Browse Marketplace →</a>
                    </div>
                    
                    <div class="card glass-card hover-up" style="text-align: center;">
                        <i class="fa-solid fa-wand-magic-sparkles" style="font-size: 2.5rem; color: #00cec9; margin-bottom: 1rem;"></i>
                        <p class="text-dim">AI Tools Used</p>
                        <h2 style="margin: 0.5rem 0;"><?php echo $data['stats']['tools_used']; ?></h2>
                        <a href="#" style="font-size: 0.85rem; color: #00cec9;">Explore Tools →</a>
                    </div>
                </div>

                <!-- Feature Cards Row -->
                <div class="grid grid-2 mb-3">
                    <!-- Featured Guides -->
                    <div class="card glass-card" style="padding: 2rem;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                            <h3>Featured Guides</h3>
                            <a href="<?php echo URLROOT; ?>/guides" style="font-size: 0.85rem; color: var(--accent-red); text-decoration: none;">View All →</a>
                        </div>
                        <ul style="list-style: none; padding: 0; display: flex; flex-direction: column; gap: 1rem;">
                            <li style="padding: 1rem; background: rgba(255,0,0,0.05); border-left: 3px solid var(--accent-red); border-radius: 4px;">
                                <h5 style="margin: 0 0 0.3rem 0;">How to Start Your Channel</h5>
                                <p class="text-dim" style="font-size: 0.85rem; margin: 0;">Learn the basics from day one</p>
                            </li>
                            <li style="padding: 1rem; background: rgba(255,0,0,0.05); border-left: 3px solid var(--accent-red); border-radius: 4px;">
                                <h5 style="margin: 0 0 0.3rem 0;">Growth Strategies</h5>
                                <p class="text-dim" style="font-size: 0.85rem; margin: 0;">Scale your audience fast</p>
                            </li>
                        </ul>
                    </div>

                    <!-- Recent Recommendations -->
                    <div class="card glass-card" style="padding: 2rem;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                            <h3>Recommended For You</h3>
                            <i class="fa-solid fa-star" style="color: #f1c40f;"></i>
                        </div>
                        <div style="padding: 1.5rem; background: linear-gradient(135deg, rgba(0,206,201,0.1), rgba(255,0,0,0.05)); border-radius: 8px;">
                            <h5 style="margin: 0 0 0.5rem 0; color: #00cec9;">YouTube Automation Masterclass</h5>
                            <p class="text-dim" style="font-size: 0.85rem; margin: 0 0 1rem 0;">Learn how to automate your channel completely</p>
                            <a href="<?php echo URLROOT; ?>/courses" class="btn btn-outline btn-sm" style="border-color: #00cec9; color: #00cec9;">Enroll Now</a>
                        </div>
                    </div>
                </div>

                <!-- Bottom Section: Resources & Support -->
                <div class="grid grid-2">
                    <!-- Resources -->
                    <div class="card glass-card" style="padding: 2rem;">
                        <h3 class="mb-3">Free Resources</h3>
                        <div style="display: flex; flex-direction: column; gap: 1rem;">
                            <a href="<?php echo URLROOT; ?>/resources" class="flex" style="padding: 1rem; background: rgba(255,255,255,0.05); border-radius: 8px; text-decoration: none; color: white; gap: 1rem; align-items: center;">
                                <i class="fa-solid fa-file-pdf" style="font-size: 1.5rem; color: var(--accent-red);"></i>
                                <div>
                                    <strong>Growth Checklist</strong><br>
                                    <span class="text-dim" style="font-size: 0.85rem;">50-point launch list</span>
                                </div>
                            </a>
                            <a href="<?php echo URLROOT; ?>/resources" class="flex" style="padding: 1rem; background: rgba(255,255,255,0.05); border-radius: 8px; text-decoration: none; color: white; gap: 1rem; align-items: center;">
                                <i class="fa-solid fa-file-pdf" style="font-size: 1.5rem; color: #00cec9;"></i>
                                <div>
                                    <strong>SEO Template</strong><br>
                                    <span class="text-dim" style="font-size: 0.85rem;">Optimize your titles & tags</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Get Help -->
                    <div class="card glass-card" style="padding: 2rem; background: linear-gradient(135deg, rgba(244, 208, 63, 0.05), rgba(255, 0, 0, 0.05)); border: 1px solid rgba(244, 208, 63, 0.2);">
                        <h3 class="mb-3">Need Help?</h3>
                        <p class="text-dim" style="margin-bottom: 1.5rem;">Book a 1-on-1 consultation with our YouTube experts</p>
                        <div style="display: flex; flex-direction: column; gap: 1rem;">
                            <a href="<?php echo URLROOT; ?>/consultation" class="btn btn-primary btn-full" style="text-align: center; background: linear-gradient(135deg, var(--accent-red), #ff6b6b);">
                                <i class="fa-solid fa-calendar"></i> Schedule Consultation
                            </a>
                            <a href="<?php echo URLROOT; ?>/contact" class="btn btn-outline btn-full" style="text-align: center;">
                                <i class="fa-solid fa-envelope"></i> Contact Support
                            </a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
