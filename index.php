<?php
$page_title = 'Home — Connecting Mysore, Informing Communities';
$page_desc = 'Discover Mysore with Global Media Network Mysore — your destination for local updates, cultural programs, business spotlight shows, and premium digital marketing services.';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';

// Load JSON data
$news_items = get_merged_json_data('news.json');
$shows = get_merged_json_data('shows.json');
$services = get_merged_json_data('services.json');
$testimonials = get_merged_json_data('testimonials.json');
$gallery = get_merged_json_data('gallery.json');
?>

<!-- ── 1. HERO BANNER ── -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content animate-fade-in-up">
            <span class="hero-tag">Digital Media Network &amp; Agency</span>
            <h1>Connecting Mysore. <span>Informing Communities.</span> Inspiring the World.</h1>
            <p class="hero-desc">We bring together news, culture, education, business, technology, and community stories through a modern digital platform designed for today's connected audience.</p>
            <div class="hero-btns">
                <a href="#prime-9" class="btn btn-primary">Explore Our Channels</a>
                <a href="<?php echo SITE_URL; ?>/services.php" class="btn btn-secondary">Our Digital Services</a>
            </div>
        </div>
        
        <!-- Live Stats Overlay -->
        <div class="hero-stats animate-scale-in">
            <div class="stat-box">
                <div class="stat-number">500+</div>
                <div class="stat-label">Projects Completed</div>
            </div>
            <div class="stat-box">
                <div class="stat-number">300+</div>
                <div class="stat-label">Happy Clients</div>
            </div>
            <div class="stat-box">
                <div class="stat-number">10K+</div>
                <div class="stat-label">Media Stories</div>
            </div>
            <div class="stat-box">
                <div class="stat-number">10+</div>
                <div class="stat-label">Years Experience</div>
            </div>
        </div>
    </div>
</section>

<!-- ── 2. LIVE BREAKING NEWS TICKER ── -->
<?php if (!empty($news_items)): ?>
<div class="ticker-wrap">
    <div class="ticker-title">Latest Update</div>
    <div class="ticker">
        <?php 
        // Duplicate array items to create seamless infinite scroll effect
        $ticker_list = array_merge($news_items, $news_items);
        foreach($ticker_list as $item): 
        ?>
            <span class="ticker-item">
                <a href="<?php echo SITE_URL; ?>/gallery.php"><?php echo htmlspecialchars($item['text']); ?></a>
            </span>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>

<!-- ── 3. INTRODUCTION SECTION ── -->
<section class="section-padding bg-light">
    <div class="container reveal">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center;">
            <div>
                <span class="section-tag">Welcome to the Network</span>
                <h2 class="section-title">Your City. Your Stories. Your Voice.</h2>
                <p class="section-desc" style="font-size: 1.1rem; line-height: 1.7; margin-bottom: 1.5rem;">
                    Global Media Network Mysore is a dynamic digital media platform committed to delivering credible information, engaging stories, local updates, entertainment, and meaningful content that connects communities across Mysore and beyond.
                </p>
                <p style="color: var(--text-muted); margin-bottom: 2rem;">
                    From important local developments and inspiring personalities to cultural celebrations, educational initiatives, business updates, and technology showcases, we aim to bring Mysuru closer to you.
                </p>
                <div style="display: flex; gap: 2rem;">
                    <div style="flex: 1;">
                        <h4 style="color: var(--accent-gold-dark); margin-bottom: 0.5rem; font-size: 1.1rem;">Local Understanding</h4>
                        <p style="font-size: 0.9rem; color: var(--text-muted);">Combining deep roots in Mysore with state-of-the-art storytelling techniques.</p>
                    </div>
                    <div style="flex: 1;">
                        <h4 style="color: var(--accent-gold-dark); margin-bottom: 0.5rem; font-size: 1.1rem;">Digital Communication</h4>
                        <p style="font-size: 0.9rem; color: var(--text-muted);">Broadcasting through websites, social handles, and emerging streaming networks.</p>
                    </div>
                </div>
            </div>
            
            <div class="relative" style="height: 480px; border-radius: var(--border-radius-lg); overflow: hidden; border: 3px solid #FFF; box-shadow: var(--shadow-lg);">
                <img src="<?php echo IMG_URL; ?>/hero/mysuru_palace.jpg" alt="Mysuru Palace Editorial Photo" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
        </div>
    </div>
</section>

<!-- ── 4. WHAT WE COVER GRID ── -->
<section class="section-padding">
    <div class="container">
        <div class="section-header text-center reveal">
            <span class="section-tag">Core Categories</span>
            <h2 class="section-title">What We Cover</h2>
            <p class="section-desc">We document and promote the complete lifestyle, heritage, and economic landscape of the heritage city.</p>
        </div>
        
        <div class="cover-grid reveal">
            <div class="cover-card gold-glow">
                <span class="card-icon"><i class="fa-solid fa-newspaper" style="color:var(--accent-gold-dark);"></i></span>
                <h3>Mysore News &amp; Updates</h3>
                <p>Stay informed about important developments, civic activities, public initiatives, and institutional updates.</p>
            </div>
            <div class="cover-card gold-glow">
                <span class="card-icon"><i class="fa-solid fa-champagne-glasses" style="color:var(--accent-gold-dark);"></i></span>
                <h3>Events &amp; Celebrations</h3>
                <p>Discover cultural programmes, conferences, exhibitions, competitions, festivals, and special occasions.</p>
            </div>
            <div class="cover-card gold-glow">
                <span class="card-icon"><i class="fa-solid fa-graduation-cap" style="color:var(--accent-gold-dark);"></i></span>
                <h3>Education &amp; Campus</h3>
                <p>Highlighting academic achievements, student activities, seminars, workshops, and research innovation.</p>
            </div>
            <div class="cover-card gold-glow">
                <span class="card-icon"><i class="fa-solid fa-briefcase" style="color:var(--accent-gold-dark);"></i></span>
                <h3>Business &amp; Startups</h3>
                <p>Stories of entrepreneurs, local businesses, industries, professionals, and organizations driving economic growth.</p>
            </div>
            <div class="cover-card gold-glow">
                <span class="card-icon"><i class="fa-solid fa-masks-theater" style="color:var(--accent-gold-dark);"></i></span>
                <h3>Entertainment &amp; Lifestyle</h3>
                <p>Explore cinema, music, food travel, wellness trends, fashion, public personalities, and lifestyle blogs.</p>
            </div>
            <div class="cover-card gold-glow">
                <span class="card-icon"><i class="fa-solid fa-microchip" style="color:var(--accent-gold-dark);"></i></span>
                <h3>Technology &amp; Innovation</h3>
                <p>Coverage of emerging technologies, artificial intelligence tools, cybersecurity, and local digital transformation.</p>
            </div>
            <div class="cover-card gold-glow">
                <span class="card-icon"><i class="fa-solid fa-landmark-dome" style="color:var(--accent-gold-dark);"></i></span>
                <h3>Culture &amp; Heritage</h3>
                <p>Celebrating the rich traditions, traditional art, literature, history, temples, and cultural identity of Mysuru.</p>
            </div>
            <div class="cover-card gold-glow">
                <span class="card-icon"><i class="fa-solid fa-people-group" style="color:var(--accent-gold-dark);"></i></span>
                <h3>Community Stories</h3>
                <p>Featuring inspiring individuals, social organizations, volunteers, and initiatives creating a positive impact.</p>
            </div>
        </div>
    </div>
</section>

<!-- ── 5. PRIME 9 KANNADA SHOWCASE ── -->
<section id="prime-9" class="section-padding bg-navy-dark">
    <div class="container reveal">
        <div class="prime-box">
            <div class="prime-brand-intro text-center">
                <div class="prime-logo-badge">PRIME 9 KANNADA</div>
                <p class="prime-tagline">Stories that inform. Journeys that inspire. Voices that matter.</p>
                <p style="color: rgba(255, 255, 255, 0.7); max-width: 750px; margin: 0 auto;">
                    Prime 9 Kannada is a dynamic digital media platform bringing together news, inspiring personalities, spiritual journeys, business spotlights, and educational segments designed to connect communities through powerful storytelling.
                </p>
                <a href="<?php echo SITE_URL; ?>/channels.php" class="btn btn-primary" style="margin-top: 2rem;">Explore Full Programs list</a>
            </div>
            
            <div class="show-grid">
                <?php 
                $featured_shows = array_slice($shows, 0, 3);
                foreach($featured_shows as $show): 
                $img_path = IMG_URL . '/channels/' . $show['slug'] . '.jpg';
                $img_file = __DIR__ . '/assets/images/channels/' . $show['slug'] . '.jpg';
                $has_img  = file_exists($img_file);
                ?>
                    <div class="show-card">
                        <div class="show-img-holder" style="<?php echo $has_img ? 'padding:0; background:none;' : ''; ?>">
                            <?php if($has_img): ?>
                                <img src="<?php echo $img_path; ?>" alt="<?php echo htmlspecialchars($show['title']); ?>" style="width:100%;height:100%;object-fit:cover;border-radius:var(--border-radius) var(--border-radius) 0 0;">
                            <?php else: ?>
                                <span class="show-card-icon"><?php echo htmlspecialchars($show['icon']); ?></span>
                            <?php endif; ?>
                            <span class="show-badge">Program</span>
                        </div>
                        <div class="show-body">
                            <h3><?php echo htmlspecialchars($show['title']); ?></h3>
                            <div class="show-tagline"><?php echo htmlspecialchars($show['tagline']); ?></div>
                            <p><?php echo htmlspecialchars($show['description']); ?></p>
                            <a href="<?php echo SITE_URL; ?>/channels.php#<?php echo $show['slug']; ?>" class="show-link">View Program Details →</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- ── 6. PROMOTE YOUR BRAND CTA BANNER ── -->
<section class="promo-banner">
    <div class="container reveal">
        <div class="promo-container">
            <div class="promo-text">
                <h2>Your Brand. Our Network. Greater Visibility.</h2>
                <p>Reach thousands of local customers through digital advertising, corporate video features, sponsored news features, and social media campaigns on our network.</p>
            </div>
            <div>
                <a href="<?php echo SITE_URL; ?>/contact.php?path=business" class="btn btn-primary">Promote With Us Now</a>
            </div>
        </div>
    </div>
</section>

<!-- ── 7. SERVICES PREVIEW ── -->
<section class="section-padding">
    <div class="container">
        <div class="section-header text-center reveal">
            <span class="section-tag">Agency Services</span>
            <h2 class="section-title">End-to-End Digital Solutions</h2>
            <p class="section-desc">From branding and custom web applications to search ranking and local lead automation, we help your business achieve measurable growth.</p>
        </div>
        
        <div class="services-summary-grid reveal">
            <?php 
            $featured_services = array_slice($services, 0, 3);
            foreach($featured_services as $srv): 
            ?>
                <div class="service-summary-card">
                    <?php 
                    $fa_icons = ['marketing' => 'fa-chart-line', 'branding' => 'fa-palette', 'social' => 'fa-share-nodes', 'google' => 'fa-google', 'tech' => 'fa-laptop-code', 'reputation' => 'fa-shield-halved', 'startup' => 'fa-rocket'];
                    $icon_class = $fa_icons[$srv['category']] ?? 'fa-star';
                    ?>
                    <span class="service-icon"><i class="fa-solid <?php echo $icon_class; ?>"></i></span>
                    <h3><?php echo htmlspecialchars($srv['title']); ?></h3>
                    <p><?php echo htmlspecialchars($srv['description']); ?></p>
                    <ul>
                        <?php 
                        $items_slice = array_slice($srv['items'], 0, 4);
                        foreach($items_slice as $li): 
                        ?>
                            <li><?php echo htmlspecialchars($li); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="<?php echo SITE_URL; ?>/services.php?highlight=<?php echo $srv['id']; ?>" class="btn btn-outline-gold btn-sm" style="width: 100%;">View Service Options</a>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center reveal">
            <a href="<?php echo SITE_URL; ?>/services.php" class="btn btn-primary">Browse All 26 Services</a>
        </div>
    </div>
</section>

<!-- ── 8. MEDIA GALLERY HIGHLIGHT ── -->
<section class="section-padding bg-navy-dark">
    <div class="container">
        <div class="section-header text-center light-content reveal">
            <span class="section-tag">Media Archive</span>
            <h2 class="section-title">Network Live Gallery</h2>
            <p class="section-desc">Glimpses of local events, interviews, campus coverages, and scenic Mysore captures.</p>
        </div>
        
        <div class="gallery-grid reveal" style="grid-template-columns: repeat(3, 1fr); grid-auto-rows: 240px;">
            <?php 
            // Show 6 real horizontal gallery images on homepage
            $gdir = __DIR__ . '/assets/images/gallery/';
            $gfiles = glob($gdir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
            $shown = 0;
            foreach ($gfiles as $gf):
                if ($shown >= 6) break;
                $gs = getimagesize($gf);
                if ($gs && $gs[1] > $gs[0]) continue; // skip vertical
                $gname = basename($gf);
                $shown++;
            ?>
                <div class="gallery-card">
                    <img src="<?php echo IMG_URL . '/gallery/' . $gname; ?>" alt="Gallery Image" loading="lazy">
                </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center reveal" style="margin-top: 3.5rem;">
            <a href="<?php echo SITE_URL; ?>/gallery.php" class="btn btn-outline-gold">View Full Gallery Archive</a>
        </div>
    </div>
</section>

<!-- ── 8.5 OUR CLIENTS & PARTNERS ── -->
<section class="section-padding bg-light" style="padding-bottom: 2rem;">
    <div class="container">
        <div class="section-header text-center reveal">
            <span class="section-tag">Trusted By</span>
            <h2 class="section-title">Our Partners & Clients</h2>
        </div>
        
        <div class="client-logos-marquee reveal">
            <div class="client-logos-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(140px, 1fr)); gap: 1.5rem; justify-items: center; align-items: center;">
                <?php 
                $clients_dir = __DIR__ . '/assets/images/clients/';
                if (is_dir($clients_dir)) {
                    $client_files = glob($clients_dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
                    foreach ($client_files as $file) {
                        $filename = basename($file);
                        echo '<div class="client-logo-card" style="background:#FFF; padding:1rem; border-radius:var(--border-radius); border:var(--border-light); width:100%; height:100px; display:flex; align-items:center; justify-content:center; transition:var(--transition-fast);">';
                        echo '<img src="' . IMG_URL . '/clients/' . $filename . '" alt="Client Logo" style="max-width:100%; max-height:100%; object-fit:contain; transition:0.3s;">';
                        echo '</div>';
                    }
                }
                // Load dashboard client uploads
                $new_path = __DIR__ . '/new_data/clients.json';
                if (file_exists($new_path)) {
                    $new_clients = json_decode(file_get_contents($new_path), true) ?: [];
                    foreach ($new_clients as $nc) {
                        echo '<div class="client-logo-card" style="background:#FFF; padding:1rem; border-radius:var(--border-radius); border:var(--border-light); width:100%; height:100px; display:flex; align-items:center; justify-content:center; transition:var(--transition-fast);">';
                        echo '<img src="' . SITE_URL . '/new_data/images/clients/' . $nc['filename'] . '" alt="' . htmlspecialchars($nc['name']) . '" style="max-width:100%; max-height:100%; object-fit:contain; transition:0.3s;">';
                        echo '</div>';
                    }
                }
                ?>
            </div>
            <style>
                .client-logo-card:hover {
                    transform: translateY(-5px);
                    box-shadow: var(--shadow-md);
                    border-color: var(--accent-gold);
                }
                .client-logo-card:hover img {
                    transform: scale(1.1);
                }
            </style>
        </div>
    </div>
</section>

<!-- ── 9. TESTIMONIALS CAROUSEL ── -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="section-header text-center reveal">
            <span class="section-tag">Success Stories</span>
            <h2 class="section-title">What Our Partners Say</h2>
            <p class="section-desc">We build relationships based on trust, quality storytelling, and clear marketing outcomes.</p>
        </div>
        
        <div class="testimonials-slider reveal">
            <?php foreach($testimonials as $t): ?>
                <div class="testimonial-card">
                    <div class="rating-stars">
                        <?php for($i = 0; $i < $t['rating']; $i++): ?>★<?php endfor; ?>
                    </div>
                    <p class="testimonial-text">"<?php echo htmlspecialchars($t['text']); ?>"</p>
                    <div class="testimonial-user">
                        <div class="user-meta">
                            <h4><?php echo htmlspecialchars($t['name']); ?></h4>
                            <span><?php echo htmlspecialchars($t['role']); ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ── 10. QUICK CONTACT CTA FORM ── -->
<section class="section-padding">
    <div class="container reveal">
        <div style="background: var(--bg-dark); border-radius: var(--border-radius-lg); border: var(--border-glow); padding: 4.5rem; display: grid; grid-template-columns: 1fr 1.2fr; gap: 4rem; align-items: center; color: #FFF;">
            <div>
                <span class="section-tag">Start a Project</span>
                <h2 style="color: #FFF; font-size: 2.2rem; margin-bottom: 1.2rem;">Ready to elevate your brand presence in Mysuru?</h2>
                <p style="color: rgba(255, 255, 255, 0.7); line-height: 1.7; margin-bottom: 2rem;">
                    Submit your query, business requirements, or community news stories. Our media coordinators and digital strategists will contact you within 24 hours.
                </p>
                <div class="footer-contact-info" style="gap: 1.2rem;">
                    <div class="contact-item">
                        <span class="icon" style="color: var(--accent-gold);">📍</span>
                        <p><?php echo SITE_ADDRESS; ?></p>
                    </div>
                    <div class="contact-item">
                        <span class="icon" style="color: var(--accent-gold);">📞</span>
                        <p><?php echo SITE_PHONE; ?></p>
                    </div>
                    <div class="contact-item">
                        <span class="icon" style="color: var(--accent-gold);">✉</span>
                        <p><?php echo SITE_EMAIL; ?></p>
                    </div>
                </div>
            </div>
            
            <div>
                <!-- Inline submission handler message container -->
                <?php if (isset($_GET['success']) && $_GET['success'] === '1'): ?>
                    <div style="background: rgba(217, 164, 65, 0.15); border: 1.5px solid var(--accent-gold); border-radius: 8px; padding: 1.5rem; color: var(--accent-gold-light); margin-bottom: 1.5rem;">
                        <strong>Thank You!</strong> Your inquiry has been logged successfully. Our team will reach out shortly.
                    </div>
                <?php endif; ?>
                
                <form action="<?php echo SITE_URL; ?>/contact.php?action=submit" method="POST" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.2rem;">
                    <input type="hidden" name="source" value="homepage_cta">
                    <div style="grid-column: span 2;">
                        <label style="display:block; font-size:0.85rem; color:rgba(255,255,255,0.7); margin-bottom:0.4rem;">Full Name *</label>
                        <input type="text" name="name" required placeholder="Enter your name" style="width:100%; padding:0.8rem; border-radius:6px; border:1px solid rgba(255,255,255,0.15); background:rgba(255,255,255,0.05); color:#FFF; outline:none;">
                    </div>
                    <div>
                        <label style="display:block; font-size:0.85rem; color:rgba(255,255,255,0.7); margin-bottom:0.4rem;">Email Address *</label>
                        <input type="email" name="email" required placeholder="Enter email" style="width:100%; padding:0.8rem; border-radius:6px; border:1px solid rgba(255,255,255,0.15); background:rgba(255,255,255,0.05); color:#FFF; outline:none;">
                    </div>
                    <div>
                        <label style="display:block; font-size:0.85rem; color:rgba(255,255,255,0.7); margin-bottom:0.4rem;">Phone Number *</label>
                        <input type="tel" name="phone" required placeholder="Enter phone" style="width:100%; padding:0.8rem; border-radius:6px; border:1px solid rgba(255,255,255,0.15); background:rgba(255,255,255,0.05); color:#FFF; outline:none;">
                    </div>
                    <div style="grid-column: span 2;">
                        <label style="display:block; font-size:0.85rem; color:rgba(255,255,255,0.7); margin-bottom:0.4rem;">Brief Requirement / Message *</label>
                        <textarea name="message" required rows="4" placeholder="Briefly describe what you would like to showcase or promote..." style="width:100%; padding:0.8rem; border-radius:6px; border:1px solid rgba(255,255,255,0.15); background:rgba(255,255,255,0.05); color:#FFF; outline:none; resize:none;"></textarea>
                    </div>
                    <div style="grid-column: span 2; margin-top:0.8rem;">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">Send Your Inquiry</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
