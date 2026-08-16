<?php
$page_title = 'Our Channels — Prime 9 Kannada Segments & Shows';
$page_desc = 'Discover the complete catalog of Prime 9 Kannada programs, including Journey Junction with Sumithra, Daiva Darshana, Campus Crew, and Roots & Reality.';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';

// Load shows data
$shows = get_json_data('shows.json');
?>

<!-- ── 1. PAGE HEADER ── -->
<section class="section-padding bg-navy-dark" style="padding-top: 10rem; padding-bottom: 6rem; text-align: center; background-image: linear-gradient(rgba(3,11,22,0.85), rgba(3,11,22,0.95)), url('<?php echo IMG_URL; ?>/hero/mysuru_palace.jpg'); background-size: cover; background-position: center;">
    <div class="container animate-fade-in-up">
        <span class="section-tag" style="color: var(--accent-gold);">Prime 9 Kannada</span>
        <h1 style="color: #FFF; font-size: 3rem; margin-bottom: 1rem;" class="display-font">Stories. Voices. Perspectives.</h1>
        <p style="color: rgba(255,255,255,0.7); max-width: 700px; margin: 0 auto; font-size: 1.1rem;">A dynamic Kannada digital media platform connecting community stories, inspiring journeys, local news, and meaningful conversations.</p>
    </div>
</section>

<!-- ── 2. CHANNEL BRANDING CARD ── -->
<section class="section-padding bg-light">
    <div class="container reveal">
        <div style="background:#FFF; padding:4rem; border-radius:var(--border-radius-lg); border:var(--border-light); box-shadow:var(--shadow-md); display:grid; grid-template-columns:1fr 1.5fr; gap:4rem; align-items:center;">
            <div style="text-align:center;">
                <div style="background:var(--bg-dark); color:var(--accent-gold); font-family:var(--font-display); font-size:2.5rem; font-weight:700; width:150px; height:150px; border-radius:50%; display:inline-flex; align-items:center; justify-content:center; border:3px solid var(--accent-gold); box-shadow:var(--shadow-lg);">P9</div>
                <h3 style="margin-top:1.5rem; font-size:1.6rem; color:var(--primary-navy);">Prime 9 Kannada</h3>
                <span class="section-tag" style="font-size:0.75rem; margin-top:0.3rem;">Digital Broadcast Channel</span>
            </div>
            
            <div>
                <h2 style="font-size:2rem; color:var(--primary-navy); margin-bottom:1.2rem;">Connecting Mysore through powerful digital media storytelling.</h2>
                <p style="color:var(--text-muted); line-height:1.7; margin-bottom:1.5rem;">
                    Prime 9 Kannada is a premium digital news and program vertical of Global Media Network Mysuru. Our goal is to create content that is informative, engaging, inspiring, and relevant, while connecting people, institutions, businesses, and local communities.
                </p>
                <div style="display:flex; gap:1rem;">
                    <a href="#shows-list" class="btn btn-primary">Browse All Programs</a>
                    <a href="<?php echo SITE_URL; ?>/contact.php?path=story" class="btn btn-outline-gold">Pitch Your Story Idea</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ── 3. SHOWS DETAILS ARCHIVE ── -->
<section id="shows-list" class="section-padding">
    <div class="container">
        <div class="section-header text-center reveal">
            <span class="section-tag">Program Details</span>
            <h2 class="section-title">Our Channels &amp; Shows</h2>
            <p class="section-desc">Explore the detailed topics, target coverage focus, and concepts behind our digital show lineup.</p>
        </div>
        
        <div style="display:flex; flex-direction:column; gap:4rem;">
            <?php 
            $index = 0;
            foreach($shows as $show): 
                $is_even = ($index % 2 === 0);
                $index++;
            ?>
                <div id="<?php echo $show['slug']; ?>" class="reveal" style="display:grid; grid-template-columns:1fr 1.2fr; gap:4rem; align-items:center; background:#FFF; border-radius:var(--border-radius-lg); border:var(--border-light); padding:3.5rem; box-shadow:var(--shadow-sm); <?php echo !$is_even ? 'direction: rtl;' : ''; ?>">
                    <!-- Column 1: Show Graphic / Thumbnail Mock -->
                    <?php
                    $img_path = IMG_URL . '/channels/' . $show['slug'] . '.jpg';
                    $img_file = __DIR__ . '/assets/images/channels/' . $show['slug'] . '.jpg';
                    $has_img  = file_exists($img_file);
                    ?>
                    <div style="direction: ltr; height: 350px; border-radius: var(--border-radius); overflow: hidden; <?php echo $has_img ? '' : 'background: linear-gradient(135deg, var(--primary-navy-dark) 0%, var(--primary-navy-light) 100%); border: var(--border-glow); padding: 2rem; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; color: #FFF;'; ?> position: relative;">
                        <?php if($has_img): ?>
                            <img src="<?php echo $img_path; ?>" alt="<?php echo htmlspecialchars($show['title']); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                        <?php else: ?>
                            <span style="font-size: 5rem; margin-bottom: 1.5rem; display: block; filter: drop-shadow(0 10px 15px rgba(0,0,0,0.3));"><?php echo htmlspecialchars($show['icon']); ?></span>
                            <h4 style="color: #FFF; font-size: 1.5rem; margin-bottom: 0.5rem; font-family: var(--font-heading);"><?php echo htmlspecialchars($show['title']); ?></h4>
                            <p style="color: var(--accent-gold-light); font-size: 0.85rem; font-style: italic; font-weight: 500;"><?php echo htmlspecialchars($show['tagline']); ?></p>
                        <?php endif; ?>
                        <span style="position: absolute; bottom: 1.5rem; left: 50%; transform: translateX(-50%); background: rgba(255,255,255,0.08); padding: 0.4rem 1.2rem; border-radius: 50px; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; border: 1px solid rgba(255,255,255,0.15); <?php echo $has_img ? 'background: rgba(0,0,0,0.5); backdrop-filter: blur(5px); color: #fff;' : ''; ?>">Prime 9 Exclusive</span>
                    </div>
                    
                    <!-- Column 2: Show Content Details -->
                    <div style="direction: ltr;">
                        <span class="section-tag" style="font-size: 0.75rem; margin-bottom: 0.5rem;">Feature Program</span>
                        <h3 style="font-size: 2rem; color: var(--primary-navy); margin-bottom: 0.8rem;"><?php echo htmlspecialchars($show['title']); ?></h3>
                        <p style="color: var(--accent-gold-dark); font-weight: 600; margin-bottom: 1.2rem; font-size: 1.05rem;"><?php echo htmlspecialchars($show['tagline']); ?></p>
                        <p style="color: var(--text-muted); line-height: 1.6; margin-bottom: 1.8rem;"><?php echo htmlspecialchars($show['description']); ?></p>
                        
                        <h4 style="font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px; color: var(--primary-navy); margin-bottom: 0.8rem; border-bottom: 1px solid rgba(100, 123, 155, 0.15); padding-bottom: 0.4rem;">Program Topics Include:</h4>
                        <ul style="list-style: none; display: grid; grid-template-columns: 1fr 1fr; gap: 0.6rem; color: var(--text-dark); font-size: 0.9rem;">
                            <?php foreach($show['topics'] as $topic): ?>
                                <li style="display: flex; gap: 0.5rem; align-items: center;"><span style="color: var(--accent-gold);">✦</span> <?php echo htmlspecialchars($topic); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        
                        <div style="margin-top: 2rem; display: flex; gap: 1rem;">
                            <a href="<?php echo SITE_URL; ?>/contact.php?path=story&show=<?php echo urlencode($show['title']); ?>" class="btn btn-outline-gold btn-sm">Submit Story/Idea</a>
                            <a href="<?php echo SITE_URL; ?>/contact.php?path=business&show=<?php echo urlencode($show['title']); ?>" class="btn btn-primary btn-sm">Sponsor This Segment</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
