<?php require APPROOT . '/views/templates/header.php'; ?>

<section id="marketplace" class="section" style="padding-top: 8rem; min-height: 80vh;">
    <div class="section-header">
        <h2><?php echo $data['title']; ?></h2>
        <p><?php echo $data['description']; ?></p>
    </div>
    
    <div class="grid grid-3 mt-4">
        <?php foreach($data['channels'] as $channel) : ?>
            <div class="card channel-card">
                <div class="channel-header">
                    <?php 
                        $bgClass = 'bg-tech';
                        $iconClass = 'fa-laptop-code';
                        if(strtolower($channel->niche) == 'gaming') { $bgClass = 'bg-gaming'; $iconClass = 'fa-gamepad'; }
                        if(strtolower($channel->niche) == 'finance') { $bgClass = 'bg-finance'; $iconClass = 'fa-chart-pie'; }
                    ?>
                    <div class="channel-avatar <?php echo $bgClass; ?>"><i class="fa-solid <?php echo $iconClass; ?>"></i></div>
                    <div class="channel-info">
                        <h4><?php echo $channel->name; ?></h4>
                        <span class="niche"><?php echo $channel->niche; ?></span>
                    </div>
                    <div class="verified-badge" title="Monetized & Verified"><i class="fa-solid fa-circle-check"></i></div>
                </div>
                <div class="channel-stats">
                    <div class="stat"><p><?php echo number_format($channel->subscribers / 1000, 1); ?>K</p><span>Subscribers</span></div>
                    <div class="stat"><p><?php echo number_format($channel->watch_hours / 1000, 1); ?>K</p><span>Watch Hrs</span></div>
                </div>
                <div class="channel-footer">
                    <span class="price">ksh<?php echo number_format($channel->price); ?></span>
                    <button class="btn btn-primary btn-sm">Buy Now</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
