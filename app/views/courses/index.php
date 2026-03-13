<?php require APPROOT . '/views/templates/header.php'; ?>

<section id="courses" class="section section-dark" style="padding-top: 8rem; min-height: 80vh;">
    <div class="section-header text-center mb-5">
        <span class="badge">Expert-Led Training</span>
        <h2 class="mt-2 text-gradient"><?php echo $data['title']; ?></h2>
        <p class="text-dim"><?php echo $data['description']; ?></p>

        <!-- Premium Search Bar -->
        <div class="search-container mt-4" style="max-width: 600px; margin: 2rem auto 0; position: relative;">
            <form action="<?php echo URLROOT; ?>/courses" method="GET">
                <i class="fa-solid fa-graduation-cap" style="position: absolute; left: 1.5rem; top: 50%; transform: translateY(-50%); color: var(--accent-red); opacity: 0.6;"></i>
                <input type="text" name="q" value="<?php echo isset($data['search_query']) ? $data['search_query'] : ''; ?>" placeholder="Find a course (e.g. 'automation')..." style="width: 100%; padding: 1.2rem 1.2rem 1.2rem 3.5rem; background: rgba(255,255,255,0.05); border: 1px solid var(--border-color); border-radius: 50px; color: white; transition: 0.3s; outline: none;" onfocus="this.style.borderColor='var(--accent-red)'">
            </form>
        </div>
    </div>
    
    <div class="grid grid-4 mt-4">
        <?php foreach($data['courses'] as $course) : ?>
            <div class="card course-card glass-card hover-up">
                <div class="course-thumbnail th-1" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(15,15,15,0.9)), url('<?php echo URLROOT; ?>/img/<?php echo $course->thumbnail; ?>'); background-size: cover; background-position: center; border-radius: var(--radius-md) var(--radius-md) 0 0;">
                    <?php if(strpos(strtolower($course->title), 'automation') !== false) : ?>
                        <div class="badge-best">Best Seller</div>
                    <?php endif; ?>
                </div>
                <div class="course-content" style="padding: 1.5rem;">
                    <div class="duration mb-2" style="font-size: 0.8rem; color: var(--accent-red); font-weight: 600; display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fa-regular fa-clock"></i> <?php echo htmlspecialchars($course->duration_hours); ?> Hours of Content
                    </div>
                    <h4 style="font-size: 1.2rem; margin-bottom: 0.8rem; line-height: 1.4;"><?php echo htmlspecialchars($course->title); ?></h4>
                    <p class="text-dim" style="font-size: 0.9rem; margin-bottom: 1.5rem;"><?php echo htmlspecialchars($course->description); ?></p>
                    
                    <div class="course-footer mt-auto" style="display: flex; justify-content: space-between; align-items: center; padding-top: 1rem; border-top: 1px solid var(--border-color);">
                        <span class="price" style="font-size: 1.3rem; font-weight: 700;">KSH <?php echo number_format($course->price, 2); ?></span>
                        <a href="<?php echo URLROOT; ?>/payments?title=<?php echo urlencode($course->title); ?>&price=<?php echo urlencode($course->price); ?>&currency=KES&description=<?php echo urlencode('Course Enrollment'); ?>" class="btn btn-primary btn-sm">Enroll Now</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
    <div class="text-center mt-5">
        <p class="text-dim">Already enrolled? <a href="<?php echo URLROOT; ?>/dashboard" class="text-accent">Access your learning portal</a></p>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
