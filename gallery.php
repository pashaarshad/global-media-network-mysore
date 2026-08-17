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
        
        <!-- Grid list -->
        <div class="gallery-grid reveal" style="margin-top: 3rem;">
            <?php 
            // Separate images by orientation
            $vertical_images = [];
            $horizontal_images = [];
            foreach ($gallery as $item) {
                if ($item['orientation'] === 'vertical') {
                    $vertical_images[] = $item;
                } else {
                    $horizontal_images[] = $item;
                }
            }

            // Custom layout logic: blocks of 1 vertical + 4 horizontal
            $render_items = [];
            $block_index = 0;

            while (!empty($horizontal_images) && !empty($vertical_images)) {
                $v = array_shift($vertical_images);
                // Assign grid placement for the vertical image
                // Alternate between left (column 1) and right (column 3)
                $col_start = ($block_index % 2 === 0) ? 1 : 3;
                $v['grid_style'] = "grid-column: $col_start; grid-row: span 2;";
                $render_items[] = $v;

                // Take up to 4 horizontals
                for ($i = 0; $i < 4; $i++) {
                    if (!empty($horizontal_images)) {
                        $h = array_shift($horizontal_images);
                        $h['grid_style'] = "grid-column: span 1; grid-row: span 1;";
                        $render_items[] = $h;
                    }
                }
                $block_index++;
            }

            // If we have remaining horizontal images, display them normally
            while (!empty($horizontal_images)) {
                $h = array_shift($horizontal_images);
                $h['grid_style'] = "grid-column: span 1; grid-row: span 1;";
                $render_items[] = $h;
            }

            // If we have remaining vertical images, display them spanning 2 rows
            while (!empty($vertical_images)) {
                $v = array_shift($vertical_images);
                $v['grid_style'] = "grid-column: span 1; grid-row: span 2;";
                $render_items[] = $v;
            }

            foreach($render_items as $item): 
            ?>
                <div class="gallery-card <?php echo $item['orientation']; ?>" data-category="<?php echo htmlspecialchars($item['category']); ?>" style="<?php echo $item['grid_style']; ?>">
                    <img src="<?php echo IMG_URL . '/gallery/' . $item['filename']; ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                    <div class="gallery-overlay">
                        <span><?php echo htmlspecialchars($item['category']); ?></span>
                        <h3><?php echo htmlspecialchars($item['title']); ?></h3>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <style>
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-auto-rows: 250px;
            gap: 1.5rem;
            grid-auto-flow: dense; /* Fill gaps automatically */
        }
        
        @media (max-width: 900px) {
            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .gallery-card {
                grid-column: span 1 !important;
                grid-row: span 1 !important;
            }
        }
        @media (max-width: 600px) {
            .gallery-grid {
                grid-template-columns: 1fr;
            }
        }
        </style>
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
