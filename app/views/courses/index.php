<?php require APPROOT . '/views/templates/header.php'; ?>

<section id="courses" class="section section-dark" style="padding-top: 8rem; min-height: 80vh;">
    <div class="section-header">
        <h2><?php echo $data['title']; ?></h2>
        <p><?php echo $data['description']; ?></p>
    </div>
    
    <div class="grid grid-4 mt-4">
        <?php foreach($data['courses'] as $course) : ?>
            <div class="card course-card">
                <!-- Using inline style or placeholder th-1 for demo purposes based on DB thumbnail -->
                <div class="course-thumbnail th-1" style="background-image: url('<?php echo URLROOT; ?>/img/<?php echo $course->thumbnail; ?>'); background-size: cover; background-position: center;">
                    <?php if(strpos(strtolower($course->title), 'automation') !== false) { echo '<div class="badge-best">Best Seller</div>'; } ?>
                </div>
                <div class="course-content">
                    <span class="duration"><i class="fa-regular fa-clock"></i> <?php echo $course->duration_hours; ?> Hours</span>
                    <h4><?php echo $course->title; ?></h4>
                    <p><?php echo $course->description; ?></p>
                    <div class="course-footer">
                        <span class="price">$<?php echo $course->price; ?></span>
                        <a href="#" class="btn btn-outline btn-sm">Enroll</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
