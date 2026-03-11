<?php require APPROOT . '/views/templates/header.php'; ?>

<section id="community" class="section section-dark" style="padding-top: 8rem; min-height: 80vh;">
    <div class="section-header text-center">
        <h2><?php echo $data['title']; ?></h2>
        <p><?php echo $data['description']; ?></p>
    </div>
    
    <div class="card hub-card glass-card mx-auto mt-4" style="max-width: 600px; text-align: center; padding: 3rem;">
        <i class="fa-solid fa-comments theme-icon" style="font-size: 4rem; color: var(--accent-red); margin-bottom: 2rem;"></i>
        <h3 class="mb-3">Join the Creator Network</h3>
        <p class="text-dim mb-4" style="font-size: 1.1rem; line-height: 1.6;">Get real-time feedback on your thumbnails, find collaboration partners, and stay updated on the latest algorithm changes in our private community groups.</p>
        
        <div class="community-buttons flex" style="flex-direction: column; gap: 1rem;">
            <button class="btn btn-outline flex-1" style="padding: 1rem;"><i class="fa-brands fa-discord" style="font-size: 1.2rem; margin-right: 0.5rem;"></i> Discord Server (VIP)</button>
            <button class="btn btn-outline flex-1" style="padding: 1rem;"><i class="fa-brands fa-telegram" style="font-size: 1.2rem; margin-right: 0.5rem;"></i> Telegram Channel</button>
            <button class="btn btn-outline flex-1" style="padding: 1rem;"><i class="fa-brands fa-whatsapp" style="font-size: 1.2rem; margin-right: 0.5rem;"></i> WhatsApp Group</button>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
