<?php require APPROOT . '/views/templates/header.php'; ?>

<section id="consultation" class="section" style="padding-top: 8rem; min-height: 80vh;">
    <div class="section-header text-center mb-5">
        <h2>
            <?php echo $data['title']; ?>
        </h2>
        <p>
            <?php echo $data['description']; ?>
        </p>
    </div>

    <div class="consultation-box card glass-card p-0 flex-row" style="max-width: 1000px; margin: 0 auto;">
        <div class="consult-info text-side p-lg">
            <h3>Choose a package</h3>

            <div class="consult-options mt-4">
                <?php foreach($data['consultations'] as $consultation) : ?>
                    <div class="consult-tier <?php echo ($consultation->duration_minutes > 30) ? 'mt-3' : ''; ?>">
                        <div class="tier-icon"><i class="fa-solid <?php echo ($consultation->duration_minutes > 30) ? 'fa-hourglass' : 'fa-stopwatch'; ?>"></i></div>
                        <div>
                            <h4><?php echo $consultation->title; ?></h4>
                            <p><?php echo ($consultation->duration_minutes > 30) ? 'Full audit, SEO strategy, and growth plan.' : 'Quick channel review & actionable tips.'; ?></p>
                            <span class="text-accent font-bold">ksh<?php echo $consultation->price; ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="call-platforms mt-4">
                <span>Available on:</span>
                <i class="fa-solid fa-video" title="Zoom"></i>
                <i class="fa-brands fa-whatsapp" title="WhatsApp"></i>
            </div>
        </div>

        <div class="consult-calendar text-side p-lg bg-darker border-l">
            <h3>Select a Date & Time</h3>
            <div class="calendar-mockup mt-3">
                <div class="cal-header">
                    <button><i class="fa-solid fa-chevron-left"></i></button>
                    <span>October 2026</span>
                    <button><i class="fa-solid fa-chevron-right"></i></button>
                </div>
                <div class="cal-grid">
                    <span>S</span><span>M</span><span>T</span><span>W</span><span>T</span><span>F</span><span>S</span>
                    <div class="day fade">29</div>
                    <div class="day fade">30</div>
                    <div class="day">1</div>
                    <div class="day">2</div>
                    <div class="day">3</div>
                    <div class="day">4</div>
                    <div class="day">5</div>
                    <div class="day">6</div>
                    <div class="day">7</div>
                    <div class="day">8</div>
                    <div class="day">9</div>
                    <div class="day">10</div>
                    <div class="day">11</div>
                    <div class="day">12</div>
                    <div class="day active">13</div>
                    <div class="day">14</div>
                    <div class="day">15</div>
                </div>

                <div class="time-slots mt-3">
                    <button class="time-btn">10:00 AM</button>
                    <button class="time-btn active">1:00 PM</button>
                    <button class="time-btn">3:30 PM</button>
                </div>

                <button class="btn btn-primary btn-full mt-4">Confirm Booking</button>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>