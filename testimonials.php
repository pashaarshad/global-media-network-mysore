<?php
$page_title = 'Client Testimonials — Reviews & Partner Stories';
$page_desc = 'Read verified reviews from schools, resort owners, startups, and brands working with Global Media Network Mysore. Submit your own partner feedback.';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';

$testimonials = get_json_data('testimonials.json');

// Handle testimonial posting
$error_msg = '';
$success_msg = '';

if (isset($_GET['action']) && $_GET['action'] === 'submit') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = clean($_POST['name'] ?? '');
        $role = clean($_POST['role'] ?? '');
        $text = clean($_POST['text'] ?? '');
        $rating = (int)($_POST['rating'] ?? 5);
        $tag = clean($_POST['tag'] ?? 'General');

        if ($name != '' && $role != '' && $text != '') {
            $new_review = [
                'id' => count($testimonials) + 1,
                'name' => $name,
                'role' => $role,
                'text' => $text,
                'rating' => $rating,
                'tag' => $tag
            ];
            
            $testimonials[] = $new_review;
            if (save_json_data('testimonials.json', $testimonials)) {
                echo "<script>window.location.href = '" . SITE_URL . "/testimonials.php?success=1';</script>";
                exit;
            } else {
                $error_msg = 'Error updating reviews database. Please try again.';
            }
        } else {
            $error_msg = 'Please fill out all required fields.';
        }
    }
}

if (isset($_GET['success']) && $_GET['success'] === '1') {
    $success_msg = 'Thank you for your valuable feedback! Your testimonial is now live on our website.';
}
?>

<!-- ── 1. PAGE HEADER ── -->
<section class="section-padding bg-navy-dark" style="padding-top: 10rem; padding-bottom: 6rem; text-align: center; background-image: linear-gradient(rgba(3,11,22,0.85), rgba(3,11,22,0.95)), url('<?php echo IMG_URL; ?>/hero/mysuru_palace.jpg'); background-size: cover; background-position: center;">
    <div class="container animate-fade-in-up">
        <span class="section-tag" style="color: var(--accent-gold);">Reviews &amp; Ratings</span>
        <h1 style="color: #FFF; font-size: 3rem; margin-bottom: 1rem;" class="display-font">What Our Partners Say</h1>
        <p style="color: rgba(255,255,255,0.7); max-width: 600px; margin: 0 auto; font-size: 1.1rem;">Verified ratings and stories of growth from local businesses, institutions, and startups.</p>
    </div>
</section>

<!-- ── 2. REVIEWS LIST ── -->
<section class="section-padding">
    <div class="container">
        <?php if ($success_msg != ''): ?>
            <div style="background: rgba(217, 164, 65, 0.15); border: 1.5px solid var(--accent-gold); border-radius: 8px; padding: 1.5rem; color: var(--accent-gold-light); margin-bottom: 3rem; text-align: center; max-width: 800px; margin-left: auto; margin-right: auto;" class="animate-scale-in">
                <strong>Success!</strong> <?php echo $success_msg; ?>
            </div>
        <?php endif; ?>

        <?php if ($error_msg != ''): ?>
            <div style="background: rgba(235, 87, 87, 0.15); border: 1.5px solid #eb5757; border-radius: 8px; padding: 1.5rem; color: #eb5757; margin-bottom: 3rem; text-align: center; max-width: 800px; margin-left: auto; margin-right: auto;" class="animate-scale-in">
                <strong>Error!</strong> <?php echo $error_msg; ?>
            </div>
        <?php endif; ?>

        <div class="testimonials-slider reveal" style="grid-template-columns: repeat(3, 1fr); gap: 2rem;">
            <?php foreach($testimonials as $t): ?>
                <div class="testimonial-card" style="display:flex; flex-direction:column; justify-content:space-between; height:100%;">
                    <div>
                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem;">
                            <div class="rating-stars">
                                <?php for($i = 0; $i < $t['rating']; $i++): ?>★<?php endfor; ?>
                            </div>
                            <span class="section-tag" style="font-size:0.7rem; margin:0; padding:0.2rem 0.6rem; background:var(--bg-light); border-radius:4px; border:var(--border-light); color:var(--accent-gold-dark);"><?php echo htmlspecialchars($t['tag']); ?></span>
                        </div>
                        <p class="testimonial-text" style="font-size:0.95rem; margin-bottom:1.5rem;">"<?php echo htmlspecialchars($t['text']); ?>"</p>
                    </div>
                    <div class="testimonial-user" style="border-top:1px solid rgba(100, 123, 155, 0.1); padding-top:1rem;">
                        <div class="user-meta">
                            <h4 style="font-size:1rem; color:var(--primary-navy);"><?php echo htmlspecialchars($t['name']); ?></h4>
                            <span style="font-size:0.8rem; color:var(--text-muted);"><?php echo htmlspecialchars($t['role']); ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ── 3. WRITE A REVIEW FORM ── -->
<section class="section-padding bg-light">
    <div class="container reveal">
        <div style="max-width: 700px; margin: 0 auto; background: #FFF; padding: 4rem; border-radius: var(--border-radius-lg); border: var(--border-light); box-shadow: var(--shadow-md);">
            <div class="text-center" style="margin-bottom: 2.5rem;">
                <span class="section-tag">Partner Feedback</span>
                <h2 style="font-size:2rem; color:var(--primary-navy);">Submit Your Testimonial</h2>
                <p style="color:var(--text-muted); font-size:0.95rem; margin-top:0.5rem;">Share your experience of working with our media channel or digital solutions agency.</p>
            </div>
            
            <form action="<?php echo SITE_URL; ?>/testimonials.php?action=submit" method="POST" style="display:flex; flex-direction:column; gap:1.2rem;">
                <div>
                    <label style="display:block; font-size:0.85rem; font-weight:600; color:var(--text-dark); margin-bottom:0.4rem;">Your Name *</label>
                    <input type="text" name="name" required placeholder="e.g. Anand Kumar" style="width:100%; padding:0.8rem; border-radius:6px; border:1px solid var(--border-light); outline:none; font-family:var(--font-body);">
                </div>
                
                <div>
                    <label style="display:block; font-size:0.85rem; font-weight:600; color:var(--text-dark); margin-bottom:0.4rem;">Role &amp; Organization *</label>
                    <input type="text" name="role" required placeholder="e.g. Managing Director, Mysuru Bakes" style="width:100%; padding:0.8rem; border-radius:6px; border:1px solid var(--border-light); outline:none; font-family:var(--font-body);">
                </div>
                
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:1.2rem;">
                    <div>
                        <label style="display:block; font-size:0.85rem; font-weight:600; color:var(--text-dark); margin-bottom:0.4rem;">Rating Star *</label>
                        <select name="rating" required style="width:100%; padding:0.8rem; border-radius:6px; border:1px solid var(--border-light); outline:none; background:#FFF; color:var(--text-dark); font-family:var(--font-body);">
                            <option value="5">⭐⭐⭐⭐⭐ (5/5)</option>
                            <option value="4">⭐⭐⭐⭐ (4/5)</option>
                            <option value="3">⭐⭐⭐ (3/5)</option>
                        </select>
                    </div>
                    <div>
                        <label style="display:block; font-size:0.85rem; font-weight:600; color:var(--text-dark); margin-bottom:0.4rem;">Service Segment *</label>
                        <select name="tag" required style="width:100%; padding:0.8rem; border-radius:6px; border:1px solid var(--border-light); outline:none; background:#FFF; color:var(--text-dark); font-family:var(--font-body);">
                            <option value="General">General Network</option>
                            <option value="Prime 9 Kannada">Prime 9 Kannada</option>
                            <option value="Digital Marketing">Digital Marketing</option>
                            <option value="Branding">Branding &amp; Design</option>
                            <option value="Video Marketing">Video Marketing</option>
                        </select>
                    </div>
                </div>
                
                <div>
                    <label style="display:block; font-size:0.85rem; font-weight:600; color:var(--text-dark); margin-bottom:0.4rem;">Your Feedback *</label>
                    <textarea name="text" required rows="4" placeholder="Share specific details about how we helped your business or featured your campus story..." style="width:100%; padding:0.8rem; border-radius:6px; border:1px solid var(--border-light); outline:none; resize:none; font-family:var(--font-body);"></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary" style="margin-top:0.8rem;">Publish Testimonial</button>
            </form>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
