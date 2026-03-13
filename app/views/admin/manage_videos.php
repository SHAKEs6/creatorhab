<?php require APPROOT . '/views/templates/header.php'; ?>

<section class="section" style="padding-top: 8rem; min-height: 80vh;">
    <div class="container" style="max-width: 1200px; margin: 0 auto;">
        <div class="section-header mb-5">
            <h2 class="text-gradient">Manage Page Videos</h2>
            <p class="text-dim">Add or remove videos from any page</p>
        </div>

        <?php if(isset($_SESSION['success'])): ?>
            <div class="alert alert-success" style="background: rgba(76,222,128,0.1); padding: 1rem; margin-bottom: 2rem; border-left: 4px solid #4ade80; border-radius: 8px;">
                <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>

        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-error" style="background: rgba(255,0,0,0.1); padding: 1rem; margin-bottom: 2rem; border-left: 4px solid #ff0000; border-radius: 8px;">
                <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <!-- Add Video Form -->
        <div class="card glass-card mb-5" style="padding: 2rem;">
            <h3 class="mb-4">Add New Video</h3>
            <form method="POST" action="<?php echo URLROOT; ?>/admin-video/addVideo">
                <div class="grid grid-2" style="gap: 1.5rem; margin-bottom: 1.5rem;">
                    <div>
                        <label class="form-label" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Page Name</label>
                        <select name="page_name" required style="width: 100%; padding: 0.8rem; background: rgba(255,255,255,0.05); color: white; border: 1px solid rgba(255,255,255,0.1); border-radius: 8px;">
                            <option value="">-- Select Page --</option>
                            <option value="home">Home</option>
                            <option value="courses">Courses</option>
                            <option value="guides">Guides</option>
                            <option value="resources">Resources</option>
                            <option value="blog">Blog</option>
                        </select>
                    </div>
                    <div>
                        <label class="form-label" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Video Title</label>
                        <input type="text" name="video_title" required placeholder="e.g. How to Grow on YouTube" style="width: 100%; padding: 0.8rem; background: rgba(255,255,255,0.05); color: white; border: 1px solid rgba(255,255,255,0.1); border-radius: 8px;">
                    </div>
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <label class="form-label" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">YouTube URL</label>
                    <input type="url" name="video_url" required placeholder="https://youtu.be/xxxxx or https://youtube.com/watch?v=xxxxx" style="width: 100%; padding: 0.8rem; background: rgba(255,255,255,0.05); color: white; border: 1px solid rgba(255,255,255,0.1); border-radius: 8px;">
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <label class="form-label" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Description (Optional)</label>
                    <textarea name="description" placeholder="Add a short description..." rows="3" style="width: 100%; padding: 0.8rem; background: rgba(255,255,255,0.05); color: white; border: 1px solid rgba(255,255,255,0.1); border-radius: 8px;"></textarea>
                </div>

                <button type="submit" class="btn btn-primary" style="background: #4ade80; color: #111; font-weight: bold;"><i class="fa-solid fa-plus"></i> Add Video</button>
            </form>
        </div>

        <!-- Videos List -->
        <div class="card glass-card" style="padding: 2rem;">
            <h3 class="mb-4">Existing Videos</h3>
            
            <div class="grid grid-2" style="gap: 2rem;">
                <?php foreach(['home' => 'Home', 'courses' => 'Courses', 'guides' => 'Guides', 'resources' => 'Resources', 'blog' => 'Blog'] as $key => $label): ?>
                    <?php 
                        $page_videos = $this->model('PageVideo')->getVideosByPage($key);
                    ?>
                    <div>
                        <h4 style="margin-bottom: 1rem; color: #4ade80;"><?php echo $label; ?></h4>
                        <?php if(!empty($page_videos)): ?>
                            <ul style="list-style: none; padding: 0;">
                                <?php foreach($page_videos as $video): ?>
                                    <li style="padding: 0.8rem; background: rgba(255,255,255,0.02); margin-bottom: 0.5rem; border-radius: 6px; display: flex; justify-content: space-between; align-items: center;">
                                        <div>
                                            <strong><?php echo htmlspecialchars($video->video_title); ?></strong>
                                            <p class="text-dim" style="font-size: 0.8rem; margin-top: 0.3rem;"><?php echo htmlspecialchars($video->description); ?></p>
                                        </div>
                                        <a href="<?php echo URLROOT; ?>/admin-video/deleteVideo/<?php echo $video->id; ?>" class="btn btn-outline btn-sm" style="color: #ff6b6b;" onclick="return confirm('Delete this video?')"><i class="fa-solid fa-trash"></i></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p class="text-dim">No videos yet</p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/templates/footer.php'; ?>
