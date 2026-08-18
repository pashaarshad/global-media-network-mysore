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
</s<!-- ── 2. CHANNEL BRANDING CARD ── -->
<section class="section-padding bg-light">
    <div class="container reveal">
        <div class="channel-branding-card">
            <div class="channel-branding-left">
                <div class="channel-branding-p9">P9</div>
                <h3>Prime 9 Kannada</h3>
                <span class="section-tag" style="font-size:0.75rem; margin-top:0.3rem;">Digital Broadcast Channel</span>
            </div>
            
            <div class="channel-branding-right">
                <h2>Connecting Mysore through powerful digital media storytelling.</h2>
                <p>
                    Prime 9 Kannada is a premium digital news and program vertical of Global Media Network Mysuru. Our goal is to create content that is informative, engaging, inspiring, and relevant, while connecting people, institutions, businesses, and local communities.
                </p>
                <div class="channel-branding-btns">
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
        
        <div class="shows-wrapper">
            <?php 
            $index = 0;
            foreach($shows as $show): 
                $is_even = ($index % 2 === 0);
                $index++;
            ?>
                <div id="<?php echo $show['slug']; ?>" class="reveal show-detail-card <?php echo !$is_even ? 'show-reverse' : ''; ?>">
                    <!-- Column 1: Show Graphic / Thumbnail Mock -->
                    <?php
                    $img_path = IMG_URL . '/channels/' . $show['slug'] . '.jpg';
                    $img_file = __DIR__ . '/assets/images/channels/' . $show['slug'] . '.jpg';
                    $has_img  = file_exists($img_file);
                    ?>
                    <div class="show-detail-img-box <?php echo $has_img ? 'has-image' : 'no-image'; ?>">
                        <?php if($has_img): ?>
                            <img src="<?php echo $img_path; ?>" alt="<?php echo htmlspecialchars($show['title']); ?>">
                        <?php else: ?>
                            <span class="show-detail-icon"><?php echo htmlspecialchars($show['icon']); ?></span>
                            <h4><?php echo htmlspecialchars($show['title']); ?></h4>
                            <p><?php echo htmlspecialchars($show['tagline']); ?></p>
                        <?php endif; ?>
                        <span class="show-detail-badge">Prime 9 Exclusive</span>
                    </div>
                    
                    <!-- Column 2: Show Content Details -->
                    <div class="show-detail-info">
                        <span class="section-tag" style="font-size: 0.75rem; margin-bottom: 0.5rem;">Feature Program</span>
                        <h3><?php echo htmlspecialchars($show['title']); ?></h3>
                        <p class="show-detail-tagline"><?php echo htmlspecialchars($show['tagline']); ?></p>
                        <p class="show-detail-desc"><?php echo htmlspecialchars($show['description']); ?></p>
                        
                        <h4>Program Topics Include:</h4>
                        <ul class="show-detail-topics">
                            <?php foreach($show['topics'] as $topic): ?>
                                <li><span>✦</span> <?php echo htmlspecialchars($topic); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        
                        <div class="show-detail-btns">
                            <a href="<?php echo SITE_URL; ?>/contact.php?path=story&show=<?php echo urlencode($show['title']); ?>" class="btn btn-outline-gold btn-sm">Submit Story/Idea</a>
                            <a href="<?php echo SITE_URL; ?>/contact.php?path=business&show=<?php echo urlencode($show['title']); ?>" class="btn btn-primary btn-sm">Sponsor This Segment</a>
                        </div>
                    </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
