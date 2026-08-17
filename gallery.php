<?php
$page_title = 'Media Gallery — Local Updates & Behind-the-Scenes Captures';
$page_desc = 'Browse our digital photo library. Discover pictures of local events, Prime 9 show broadcasts, business launches, and Mysuru cultural highlights.';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';

// Load gallery data
$gallery = get_json_data('gallery.json');
?>

<!-- ── 1. PAGE HEADER ── -->
<section class="section-padding bg-navy-dark" style="padding-top: 10rem; padding-bottom: 6rem; text-align: center; background-image: linear-gradient(rgba(3,11,22,0.85), rgba(3,11,22,0.95)), url('<?php echo IMG_URL; ?>/hero/mysuru_palace.jpg'); background-size: cover; background-position: center;">
    <div class="container animate-fade-in-up">
        <span class="section-tag" style="color: var(--accent-gold);">Visual Archives</span>
        <h1 style="color: #FFF; font-size: 3rem; margin-bottom: 1rem;" class="display-font">Network Live Gallery</h1>
        <p style="color: rgba(255,255,255,0.7); max-width: 600px; margin: 0 auto; font-size: 1.1rem;">Capturing the events, programs, local developments, and cultural milestones of Mysuru.</p>
    </div>
</section>

<!-- ── 2. GALLERY DOCK ── -->
<section class="section-padding">
    <div class="container">
        <!-- Filter Tabs -->
        <div class="gallery-filter-bar reveal">
            <button class="filter-btn active" data-filter="all">All Photos</button>
            <button class="filter-btn" data-filter="news">News Coverage</button>
            <button class="filter-btn" data-filter="prime9">Prime 9 Shows</button>
            <button class="filter-btn" data-filter="events">Events &amp; festivals</button>
            <button class="filter-btn" data-filter="business">Business spotlights</button>
            <button class="filter-btn" data-filter="campus">Campus crew</button>
            <button class="filter-btn" data-filter="culture">Culture &amp; Heritage</button>
        </div>
        
        <!-- Horizontal Images Grid (Top) -->
        <div class="gallery-grid gallery-horizontal reveal" style="margin-top: 3rem;">
            <?php 
            // Read horizontal images directly from gallery/ folder (non-V files)
            $gallery_dir = __DIR__ . '/assets/images/gallery/';
            $h_files = glob($gallery_dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
            foreach ($h_files as $file):
                $filename = basename($file);
                // Check dimensions - only show horizontal images here
                $size = getimagesize($file);
                if ($size && $size[1] > $size[0]) continue; // skip vertical
            ?>
                <div class="gallery-card">
                    <img src="<?php echo IMG_URL . '/gallery/' . $filename; ?>" alt="Gallery Image" loading="lazy">
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Vertical Images Grid (Below) -->
        <div class="gallery-grid gallery-vertical reveal" style="margin-top: 1.5rem;">
            <?php 
            // Read vertical images from gallery/V/ folder
            $v_dir = __DIR__ . '/assets/images/gallery/V/';
            if (is_dir($v_dir)) {
                $v_files = glob($v_dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
                foreach ($v_files as $file):
                    $filename = basename($file);
                ?>
                    <div class="gallery-card">
                        <img src="<?php echo IMG_URL . '/gallery/V/' . $filename; ?>" alt="Gallery Image" loading="lazy">
                    </div>
                <?php endforeach;
            } else {
                // Fallback: read vertical images from main gallery folder by checking dimensions
                foreach ($h_files as $file):
                    $filename = basename($file);
                    $size = getimagesize($file);
                    if (!$size || $size[0] >= $size[1]) continue; // skip horizontal
                ?>
                    <div class="gallery-card">
                        <img src="<?php echo IMG_URL . '/gallery/' . $filename; ?>" alt="Gallery Image" loading="lazy">
                    </div>
                <?php endforeach;
            }
            ?>
        </div>
    </div>
</section>

<!-- ── 3. SUBMIT CTA ── -->
<section class="section-padding bg-light">
    <div class="container reveal">
        <div style="background: var(--bg-dark); color: #FFF; padding: 4rem; border-radius: var(--border-radius-lg); text-align: center; border: var(--border-glow);">
            <span class="section-tag" style="color: var(--accent-gold);">Are You a Creator?</span>
            <h2 style="color: #FFF; font-size: 2.2rem; margin-bottom: 1rem;" class="display-font">Contribute to the Mysuru Media Gallery</h2>
            <p style="color: rgba(255,255,255,0.75); max-width: 700px; margin: 0 auto 2rem auto; line-height: 1.7;">
                We collaborate with local journalists, photographers, videographers, students, and digital creators. Pitch your high-resolution photos or coverage pitches to our editorial desk.
            </p>
            <a href="<?php echo SITE_URL; ?>/contact.php?path=creator" class="btn btn-primary">Join as Creator / Partner</a>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
