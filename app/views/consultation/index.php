<?php require APPROOT . '/views/templates/header.php'; ?>

<section id="consultation" class="section" style="padding-top: 8rem; min-height: 80vh;">
    <div class="section-header text-center mb-5">
        <span class="badge">1-on-1 Expert Guidance</span>
        <h2 class="mt-2 text-gradient"><?php echo $data['title']; ?></h2>
        <p class="text-dim"><?php echo $data['description']; ?></p>
    </div>

    <div class="consultation-container grid grid-2" style="max-width: 1100px; margin: 0 auto; gap: 3rem; align-items: start;">
        <!-- Left Side: Packages -->
        <div class="consult-info">
            <h3 class="mb-4" style="font-size: 1.8rem;">Select a Session</h3>

            <div class="consult-options" style="display: flex; flex-direction: column; gap: 1.5rem;">
                <?php foreach($data['consultations'] as $consultation) : ?>
                    <div class="consult-tier card glass-card hover-up" style="display: flex; gap: 1.5rem; align-items: center; cursor: pointer; border: 1px solid var(--border-color);">
                        <div class="tier-icon" style="width: 60px; height: 60px; background: rgba(255,0,0,0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: var(--accent-red);">
                            <i class="fa-solid <?php echo ($consultation->duration_minutes > 30) ? 'fa-rocket' : 'fa-bolt'; ?>"></i>
                        </div>
                        <div style="flex: 1;">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.3rem;">
                                <h4 style="margin: 0; font-size: 1.2rem;"><?php echo htmlspecialchars($consultation->title); ?></h4>
                                <span class="text-accent" style="font-weight: 700; font-size: 1.1rem;">ksh <?php echo number_format($consultation->price); ?></span>
                            </div>
                            <p class="text-dim" style="font-size: 0.9rem; margin-bottom: 0.5rem;"><?php echo ($consultation->duration_minutes > 30) ? 'Full audit, SEO strategy, and growth plan.' : 'Quick channel review & actionable tips.'; ?></p>
                            <span style="font-size: 0.8rem; background: rgba(255,255,255,0.05); padding: 0.2rem 0.6rem; border-radius: 4px; color: #ddd;">
                                <i class="fa-regular fa-clock"></i> <?php echo $consultation->duration_minutes; ?> Minutes
                            </span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="call-platforms mt-5" style="padding: 1.5rem; background: rgba(255,255,255,0.02); border-radius: var(--radius-md); border: 1px solid var(--border-color);">
                <p class="mb-3" style="font-weight: 600;">Secure sessions via:</p>
                <div style="display: flex; gap: 2rem; align-items: center;">
                    <div style="text-align: center;"><i class="fa-solid fa-video mb-1" style="font-size: 1.5rem; color: #fff;"></i><span style="display: block; font-size: 0.7rem; color: var(--text-dim);">Zoom</span></div>
                    <div style="text-align: center;"><i class="fa-brands fa-google mb-1" style="font-size: 1.5rem; color: #fff;"></i><span style="display: block; font-size: 0.7rem; color: var(--text-dim);">Meet</span></div>
                    <div style="text-align: center;"><i class="fa-brands fa-whatsapp mb-1" style="font-size: 1.5rem; color: #fff;"></i><span style="display: block; font-size: 0.7rem; color: var(--text-dim);">WhatsApp</span></div>
                </div>
            </div>
        </div>

        <!-- Right Side: Scheduling Mockup -->
        <div class="consult-calendar card glass-card" style="padding: 2.5rem; background: var(--bg-card);">
            <h3 class="mb-4" style="font-size: 1.5rem;">Pick Date & Time</h3>
            
            <div class="calendar-mockup">
                <div class="cal-header mb-4" style="display: flex; justify-content: space-between; align-items: center;">
                    <button class="btn-icon" style="background: none; border: none; color: #fff; cursor: pointer;"><i class="fa-solid fa-chevron-left"></i></button>
                    <span style="font-weight: 700; font-size: 1.1rem; letter-spacing: 1px;">OCTOBER 2026</span>
                    <button class="btn-icon" style="background: none; border: none; color: #fff; cursor: pointer;"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
                
                <div class="cal-grid" style="display: grid; grid-template-columns: repeat(7, 1fr); gap: 0.5rem; text-align: center; margin-bottom: 2rem;">
                    <?php foreach(['S','M','T','W','T','F','S'] as $day) echo "<span style='font-size: 0.7rem; color: var(--accent-red); font-weight: 800;'>$day</span>"; ?>
                    <?php for($i=1; $i<=15; $i++): ?>
                        <div class="day <?php echo ($i == 13) ? 'active' : ''; ?>" style="padding: 0.8rem 0; border-radius: 8px; cursor: pointer; transition: 0.2s; <?php echo ($i == 13) ? 'background: var(--accent-red); color: #fff; font-weight: 700; box-shadow: 0 4px 10px rgba(255,0,0,0.3);' : 'background: rgba(255,255,255,0.03);'; ?>">
                            <?php echo $i; ?>
                        </div>
                    <?php endfor; ?>
                </div>

                <div class="time-slots mb-4">
                    <p class="mb-3" style="font-size: 0.9rem; font-weight: 600;">Available Slots (GMT +3)</p>
                    <div class="grid grid-2" style="gap: 1rem;">
                        <button class="btn btn-outline btn-sm">10:00 AM</button>
                        <button class="btn btn-primary btn-sm">01:30 PM</button>
                        <button class="btn btn-outline btn-sm">04:00 PM</button>
                        <button class="btn btn-outline btn-sm">08:00 PM</button>
                    </div>
                </div>

                <button id="btn-proceed" class="btn btn-primary btn-full" style="padding: 1rem;" disabled><i class="fa-solid fa-lock"></i> Proceed to Payment</button>
                <p class="text-center mt-3" style="font-size: 0.8rem; color: var(--text-dim);">
                    <i class="fa-solid fa-lock"></i> 100% Secure Checkout
                </p>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let selected = null;
        const tiers = document.querySelectorAll('.consult-tier');
        const proceedBtn = document.getElementById('btn-proceed');

        tiers.forEach(tier => {
            tier.addEventListener('click', function() {
                tiers.forEach(t => t.classList.remove('selected'));
                this.classList.add('selected');

                const titleElem = this.querySelector('h4');
                const priceElem = this.querySelector('.text-accent');
                const rawPrice = priceElem ? priceElem.textContent.replace(/[^0-9\.]/g, '') : '';

                selected = {
                    title: titleElem ? titleElem.textContent.trim() : '',
                    price: rawPrice
                };

                proceedBtn.disabled = false;
            });
        });

        proceedBtn.addEventListener('click', function() {
            if (!selected) {
                alert('Please select a session.');
                return;
            }
            const url = '<?php echo URLROOT; ?>/payments?title=' + encodeURIComponent(selected.title) +
                        '&price=' + encodeURIComponent(selected.price) +
                        '&currency=KSH&description=' + encodeURIComponent('Consultation');
            window.location = url;
        });
    });
</script>

<style>
    .consult-tier.selected { border-color: var(--accent-red); box-shadow: 0 4px 10px rgba(255,0,0,0.3); }
</style>

<?php require APPROOT . '/views/templates/footer.php'; ?>