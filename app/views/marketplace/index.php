<?php require APPROOT . '/views/templates/header.php'; ?>

<section id="marketplace" class="section" style="padding-top: 8rem; min-height: 80vh;">
    <div class="section-header text-center mb-5">
        <span class="badge">Verified Accounts Only</span>
        <h2 class="mt-2 text-gradient"><?php echo $data['title']; ?></h2>
        <p class="text-dim"><?php echo $data['description']; ?></p>

        <!-- Premium Search Bar -->
        <div class="search-container mt-4" style="max-width: 600px; margin: 2rem auto 0; position: relative;">
            <form action="<?php echo URLROOT; ?>/marketplace" method="GET">
                <i class="fa-solid fa-search" style="position: absolute; left: 1.5rem; top: 50%; transform: translateY(-50%); color: var(--accent-red); opacity: 0.6;"></i>
                <input type="text" name="q" value="<?php echo isset($data['search_query']) ? $data['search_query'] : ''; ?>" placeholder="Search channels or products..." style="width: 100%; padding: 1.2rem 1.2rem 1.2rem 3.5rem; background: rgba(255,255,255,0.05); border: 1px solid var(--border-color); border-radius: 50px; color: white; transition: 0.3s; outline: none;" onfocus="this.style.borderColor='var(--accent-red)'">
            </form>
        </div>
    </div>
    
    <div class="grid grid-3 mt-4">
        <?php foreach($data['channels'] as $channel) : ?>
            <div class="card channel-card glass-card hover-up">
                <div class="channel-header">
                    <?php 
                        $bgClass = 'bg-tech';
                        $iconClass = 'fa-laptop-code';
                        if(strtolower($channel->niche) == 'gaming') { $bgClass = 'bg-gaming'; $iconClass = 'fa-gamepad'; }
                        if(strtolower($channel->niche) == 'finance') { $bgClass = 'bg-finance'; $iconClass = 'fa-chart-pie'; }
                    ?>
                    <div class="channel-avatar <?php echo $bgClass; ?>"><i class="fa-solid <?php echo $iconClass; ?>"></i></div>
                    <div class="channel-info">
                        <h4><?php echo htmlspecialchars($channel->name); ?></h4>
                        <span class="niche"><?php echo htmlspecialchars($channel->niche); ?></span>
                    </div>
                </div>
                <!-- ... stats ... -->
                <div class="channel-footer" style="padding: 1.5rem; display: flex; justify-content: space-between; align-items: center;">
                    <span class="price"><?php echo htmlspecialchars('KSH ' . number_format($channel->price,2)); ?></span>
                    <a href="<?php echo URLROOT; ?>/payments?title=<?php echo urlencode($channel->name); ?>&price=<?php echo urlencode($channel->price); ?>&currency=KSH&description=<?php echo urlencode('YouTube channel purchase'); ?>" class="btn btn-primary btn-sm">Buy Now</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Products Section -->
    <div class="section-header mt-5 pt-5 text-center">
        <span class="badge">Digital Tools & Services</span>
        <h2 class="mt-2 text-gradient">Creator Essentials</h2>
    </div>

    <div class="grid grid-4 mt-4">
        <?php foreach($data['products'] as $product) : ?>
            <div class="card glass-card hover-up" style="padding: 0; overflow: hidden;">
                <div style="height: 180px; background: rgba(255,255,255,0.02); display: flex; align-items: center; justify-content: center;">
                    <i class="fa-solid fa-cube" style="font-size: 3rem; color: var(--accent-red); opacity: 0.5;"></i>
                </div>
                <div style="padding: 1.5rem;">
                    <span class="badge mb-2" style="font-size: 0.7rem;"><?php echo $product->category; ?></span>
                    <h4 class="mb-2"><?php echo $product->name; ?></h4>
                    <p class="text-dim mb-4" style="font-size: 0.85rem; line-height: 1.4;"><?php echo substr($product->description, 0, 60); ?>...</p>
                    <div class="flex flex-between align-center">
                        <span style="font-weight: 700; color: #fff;"><?php echo htmlspecialchars('KES ' . number_format($product->price,2)); ?></span>
                        <a href="<?php echo URLROOT; ?>/payments?title=<?php echo urlencode($product->name); ?>&price=<?php echo urlencode($product->price); ?>&currency=KES&description=<?php echo urlencode($product->category . ' - ' . $product->name); ?>" class="btn btn-outline btn-sm">Buy Now</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="text-center mt-5">
        <div class="card glass-card" style="display: inline-block; padding: 2rem;">
            <h3>Need a Custom Solution?</h3>
            <p class="text-dim mb-3">Our team can help you build exactly what you need.</p>
            <a href="<?php echo URLROOT; ?>/consulting" class="btn btn-primary">Book Consultation</a>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
