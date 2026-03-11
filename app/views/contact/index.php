<?php require APPROOT . '/views/templates/header.php'; ?>

<section id="contact" class="section section-dark" style="padding-top: 8rem; min-height: 80vh;">
    <div class="grid grid-2" style="max-width: 1000px; margin: 0 auto;">
        <div class="contact-info p-lg">
            <h2 class="mb-3">
                <?php echo $data['title']; ?>
            </h2>
            <p class="text-dim mb-5">
                <?php echo $data['description']; ?>
            </p>

            <div class="info-item flex-row mb-4" style="align-items: center;">
                <div class="icon-circle"
                    style="width: 50px; height: 50px; border-radius: 50%; background: rgba(229,9,20,0.1); display: flex; justify-content: center; align-items: center; margin-right: 1.5rem;">
                    <i class="fa-solid fa-envelope theme-icon" style="color: var(--accent-red); margin: 0;"></i>
                </div>
                <div>
                    <h4 class="mb-1">Email Support</h4>
                    <p class="text-dim m-0">support@creatorhub.com</p>
                </div>
            </div>

            <div class="info-item flex-row mb-4" style="align-items: center;">
                <div class="icon-circle"
                    style="width: 50px; height: 50px; border-radius: 50%; background: rgba(229,9,20,0.1); display: flex; justify-content: center; align-items: center; margin-right: 1.5rem;">
                    <i class="fa-solid fa-briefcase theme-icon" style="color: var(--accent-red); margin: 0;"></i>
                </div>
                <div>
                    <h4 class="mb-1">Partnerships</h4>
                    <p class="text-dim m-0">dewin@creatorhub.com</p>
                </div>
            </div>
        </div>

        <div class="contact-form-container card glass-card">
            <h3 class="mb-4">Send a Message</h3>
            <form action="" method="POST">
                <input type="hidden" name="csrf_token" value="<?php echo csrf_token(); ?>">
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" id="name" name="name" class="form-control" required
                        style="width: 100%; padding: 0.8rem; background: rgba(255,255,255,0.05); color: white; border: 1px solid rgba(255,255,255,0.1); border-radius: var(--radius-sm);">
                </div>
                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" required
                        style="width: 100%; padding: 0.8rem; background: rgba(255,255,255,0.05); color: white; border: 1px solid rgba(255,255,255,0.1); border-radius: var(--radius-sm);">
                </div>
                <div class="form-group mb-4">
                    <label for="message" class="form-label">Your Message</label>
                    <textarea id="message" name="message" rows="5" class="form-control" required
                        style="width: 100%; padding: 0.8rem; background: rgba(255,255,255,0.05); color: white; border: 1px solid rgba(255,255,255,0.1); border-radius: var(--radius-sm); resize: vertical;"></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Send Message</button>
            </form>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>