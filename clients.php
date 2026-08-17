<?php
$page_title = 'Our Clients & Partners — Collaborations & Brand Networks';
$page_desc = 'Discover our partner ecosystem. We work with educational institutions, hospitality brands, startups, real estate companies, and local brands across Mysore.';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
?>

<!-- ── 1. PAGE HEADER ── -->
<section class="section-padding bg-navy-dark" style="padding-top: 10rem; padding-bottom: 6rem; text-align: center; background-image: linear-gradient(rgba(3,11,22,0.85), rgba(3,11,22,0.95)), url('<?php echo IMG_URL; ?>/hero/mysuru_palace.jpg'); background-size: cover; background-position: center;">
    <div class="container animate-fade-in-up">
        <span class="section-tag" style="color: var(--accent-gold);">Partner Network</span>
        <h1 style="color: #FFF; font-size: 3rem; margin-bottom: 1rem;" class="display-font">Building Visibility. Creating Connections.</h1>
        <p style="color: rgba(255,255,255,0.7); max-width: 600px; margin: 0 auto; font-size: 1.1rem;">We collaborate with organizations across diverse verticals to tell their story and scale their digital footprint.</p>
    </div>
</section>

<!-- ── 1.5 CLIENT LOGOS GRID ── -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="section-header text-center reveal">
            <span class="section-tag">Our Network</span>
            <h2 class="section-title">Brands We Work With</h2>
            <p class="section-desc">We are proud to collaborate with leading businesses and organizations.</p>
        </div>
        
        <div class="client-logos-grid reveal">
            <?php 
            $clients_dir = __DIR__ . '/assets/images/clients/';
            if (is_dir($clients_dir)) {
                $client_files = glob($clients_dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
                foreach ($client_files as $file) {
                    $filename = basename($file);
                    echo '<div class="client-logo-card">';
                    echo '<img src="' . IMG_URL . '/clients/' . $filename . '" alt="Client Logo">';
                    echo '</div>';
                }
            }
            ?>
        </div>
        
        <style>
        .client-logos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 2rem;
            align-items: center;
            justify-items: center;
        }
        .client-logo-card {
            background: #FFF;
            padding: 1.5rem;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-sm);
            border: var(--border-light);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 120px;
            width: 100%;
            transition: var(--transition-fast);
        }
        .client-logo-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
            border-color: var(--accent-gold);
        }
        .client-logo-card img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            filter: grayscale(100%);
            opacity: 0.7;
            transition: var(--transition-fast);
        }
        .client-logo-card:hover img {
            filter: grayscale(0%);
            opacity: 1;
        }
        </style>
    </div>
</section>

<!-- ── 2. SECTOR VERTICALS GRID ── -->
<section class="section-padding">
    <div class="container">
        <div class="section-header text-center reveal">
            <span class="section-tag">Industries We Serve</span>
            <h2 class="section-title">Who Works with Global Media Network?</h2>
            <p class="section-desc">We design custom marketing campaigns and media features tailored to the unique goals of each industry sector.</p>
        </div>
        
        <div class="services-summary-grid reveal" style="grid-template-columns: repeat(3, 1fr);">
            <!-- Sector 1: Education -->
            <div class="service-summary-card">
                <span class="service-icon">🏫</span>
                <h3>Educational Institutions</h3>
                <p>We feature schools and colleges through our Campus Crew program, showcase academic milestones, and run admissions marketing campaigns.</p>
            </div>
            
            <!-- Sector 2: Real Estate -->
            <div class="service-summary-card">
                <span class="service-icon">🏢</span>
                <h3>Real Estate &amp; Developers</h3>
                <p>High-end property walkthroughs, video presentations, map rank optimizations, and lead generation campaigns for residential and commercial spaces.</p>
            </div>
            
            <!-- Sector 3: Hotels & Tourism -->
            <div class="service-summary-card">
                <span class="service-icon">🍽️</span>
                <h3>Hotels, Resorts &amp; Restaurants</h3>
                <p>Food reviews, cinematic tourist attraction promotions, Google Business ranking management, and custom social media Reels creation.</p>
            </div>
            
            <!-- Sector 4: Local Brands -->
            <div class="service-summary-card">
                <span class="service-icon">🛍️</span>
                <h3>Local Retail Brands</h3>
                <p>Festival launch creatives, WhatsApp catalogs, custom posters, and location maps setup for shopping spaces, salons, and jewelers.</p>
            </div>
            
            <!-- Sector 5: Startups -->
            <div class="service-summary-card">
                <span class="service-icon">🚀</span>
                <h3>Startups &amp; Entrepreneurs</h3>
                <p>Pitching business blueprints through Business Spotlight interviews, digital launches, investor profiles, and automated CRM setups.</p>
            </div>
            
            <!-- Sector 6: Social Organizations -->
            <div class="service-summary-card">
                <span class="service-icon">🤝</span>
                <h3>Social &amp; Public Organizations</h3>
                <p>PR campaign writing, online community initiatives outreach, press release distribution, and awareness posters creation.</p>
            </div>
        </div>
    </div>
</section>

<!-- ── 3. COLLABORATION INQUIRY CTA ── -->
<section class="section-padding bg-light">
    <div class="container reveal">
        <div style="background:#FFF; padding:4rem; border-radius:var(--border-radius-lg); border:var(--border-light); box-shadow:var(--shadow-md); display:grid; grid-template-columns:1.2fr 1fr; gap:4rem; align-items:center;">
            <div>
                <span class="section-tag">Partner With Us</span>
                <h2 style="font-size:2rem; color:var(--primary-navy); margin-bottom:1rem;">Become a Brand Partner or Sponsor</h2>
                <p style="color:var(--text-muted); line-height:1.7; margin-bottom:1.5rem;">
                    Global Media Network Mysore helps you build digital authority. If your business, institution, or NGO wants to sponsor programs on Prime 9 Kannada, distribute news, or run high-intent conversion ads, we are here to collaborate.
                </p>
                <div style="display:flex; flex-direction:column; gap:0.8rem; color:var(--text-dark); font-size:0.9rem;">
                    <p><strong>✔ Featured Sponsorships:</strong> Pre-roll ads, host name integrations, and overlay banners.</p>
                    <p><strong>✔ Co-Branded Content:</strong> Jointly created segments highlighting community solutions.</p>
                    <p><strong>✔ Media Partnerships:</strong> Official network coverage for major regional events.</p>
                </div>
            </div>
            
            <div>
                <h3 style="margin-bottom:1.5rem; font-size:1.4rem; color:var(--primary-navy);">Corporate Inquiry</h3>
                <form action="<?php echo SITE_URL; ?>/contact.php?action=submit" method="POST" style="display:flex; flex-direction:column; gap:1rem;">
                    <input type="hidden" name="source" value="client_page">
                    <input type="text" name="name" required placeholder="Contact Person Name" style="width:100%; padding:0.8rem; border-radius:6px; border:1px solid var(--border-light); outline:none;">
                    <input type="email" name="email" required placeholder="Corporate Email Address" style="width:100%; padding:0.8rem; border-radius:6px; border:1px solid var(--border-light); outline:none;">
                    <input type="text" name="company" placeholder="Company / Institution Name" style="width:100%; padding:0.8rem; border-radius:6px; border:1px solid var(--border-light); outline:none;">
                    <select name="subject" required style="width:100%; padding:0.8rem; border-radius:6px; border:1px solid var(--border-light); outline:none; background:#FFF; color:var(--text-dark);">
                        <option value="Sponsorship Option">Sponsorship Query</option>
                        <option value="Media Coverage Partnership">Media Coverage Partnership</option>
                        <option value="Long-term Digital Agency Contract">Agency Retainer Contract</option>
                    </select>
                    <textarea name="message" required rows="3" placeholder="Describe your collaboration requirements..." style="width:100%; padding:0.8rem; border-radius:6px; border:1px solid var(--border-light); outline:none; resize:none;"></textarea>
                    <button type="submit" class="btn btn-primary">Submit Partner Pitch</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
