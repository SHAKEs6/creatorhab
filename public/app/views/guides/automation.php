<?php require APPROOT . '/views/templates/header.php'; ?>

<section class="section section-dark" style="padding-top: 10rem; min-height: 80vh;">
    <div class="automation-banner">
        <div class="flex-row">
            <div class="text-side">
                <span class="badge" style="margin-bottom: 1rem;">Trending Now</span>
                <h2><?php echo $data['title']; ?></h2>
                <p>Build passive income channels without ever showing your face. Discover our elite workflows to automate content creation safely and efficiently.</p>
                <ul class="feature-list mt-4" style="list-style: none; padding: 0;">
                    <li style="margin-bottom: 1rem;"><i class="fa-solid fa-user-ninja" style="color: var(--accent-red); margin-right: 1rem; width: 20px;"></i> Faceless Channels</li>
                    <li style="margin-bottom: 1rem;"><i class="fa-solid fa-file-pen" style="color: var(--accent-red); margin-right: 1rem; width: 20px;"></i> AI Script Writing & Generation</li>
                    <li style="margin-bottom: 1rem;"><i class="fa-solid fa-microphone-lines" style="color: var(--accent-red); margin-right: 1rem; width: 20px;"></i> Professional Voice-over Tools</li>
                    <li style="margin-bottom: 1rem;"><i class="fa-solid fa-scissors" style="color: var(--accent-red); margin-right: 1rem; width: 20px;"></i> Hiring Elite Video Editors</li>
                    <li style="margin-bottom: 1rem;"><i class="fa-solid fa-people-arrows" style="color: var(--accent-red); margin-right: 1rem; width: 20px;"></i> Full Output Outsourcing</li>
                </ul>
                <a href="<?php echo URLROOT; ?>/courses" class="btn btn-primary mt-4">Master Automation Courses</a>
            </div>
            <div class="image-side">
                <div class="glass-card mockup-automation" style="padding: 2rem; border-radius: var(--radius-md);">
                    <div class="mockup-header" style="font-weight: bold; margin-bottom: 1.5rem; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 1rem;">
                        <i class="fa-solid fa-robot" style="color: var(--accent-red); margin-right: 0.5rem;"></i> Content Generation AI
                    </div>
                    <div class="mockup-body">
                        <div class="mockup-line skeleton" style="height: 15px; background: rgba(255,255,255,0.1); margin-bottom: 1rem; border-radius: 4px;"></div>
                        <div class="mockup-line skeleton w-80" style="height: 15px; background: rgba(255,255,255,0.1); margin-bottom: 1rem; border-radius: 4px; width: 80%;"></div>
                        <div class="mockup-line skeleton" style="height: 15px; background: rgba(255,255,255,0.1); margin-bottom: 2rem; border-radius: 4px; width: 60%;"></div>
                        <div class="mockup-btn" style="background: var(--accent-red); color: white; padding: 0.8rem; text-align: center; border-radius: 4px; font-weight: bold;">Generate Video Idea</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="text-center" style="margin-top: 5rem;">
        <a href="<?php echo URLROOT; ?>/guides" class="btn btn-outline"><i class="fa-solid fa-arrow-left"></i> Back to Guides</a>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
