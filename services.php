<?php
$page_title = 'Digital Services — 26 Powerful Web & Marketing Solutions';
$page_desc = 'Explore our catalog of 26 digital services, spanning advertising campaigns, complete branding kits, local SEO, e-commerce stores, WhatsApp bots, and Zero-to-Growth setups.';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';

// Load services data
$services = get_merged_json_data('services.json');

// Check if a highlight parameter is present in URL
$highlight_slug = isset($_GET['highlight']) ? clean($_GET['highlight']) : '';
?>

<!-- Services page specific styles -->
<style>
.services-search-container {
    background: #FFF;
    border-radius: var(--border-radius-lg);
    border: var(--border-light);
    box-shadow: var(--shadow-sm);
    padding: 2rem;
    margin-top: -3.5rem;
    position: relative;
    z-index: 100;
    display: flex;
    gap: 1.5rem;
    align-items: center;
    flex-wrap: wrap;
}
.search-input-wrapper {
    flex: 1;
    min-width: 280px;
    position: relative;
}
.search-icon-fixed {
    position: absolute;
    left: 1.2rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-muted);
    font-size: 1.1rem;
}
.search-input-field {
    width: 100%;
    padding: 0.9rem 1rem 0.9rem 3rem;
    border-radius: 50px;
    border: 1.5px solid var(--border-light);
    font-size: 0.95rem;
    font-family: var(--font-body);
    outline: none;
    transition: var(--transition-fast);
}
.search-input-field:focus {
    border-color: var(--accent-gold);
    box-shadow: 0 0 10px rgba(217, 164, 65, 0.1);
}
.category-tabs-container {
    display: flex;
    gap: 0.6rem;
    flex-wrap: wrap;
}
.category-tab {
    background: var(--bg-light);
    border: 1px solid var(--border-light);
    padding: 0.6rem 1.4rem;
    border-radius: 50px;
    font-size: 0.85rem;
    font-weight: 600;
    color: var(--text-dark);
    cursor: pointer;
    transition: var(--transition-fast);
}
.category-tab:hover, .category-tab.active {
    background: var(--accent-gold);
    border-color: var(--accent-gold);
    color: var(--primary-navy-dark);
}
.service-details-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2rem;
    margin-top: 4rem;
}
.service-detail-card {
    background: #FFF;
    border-radius: var(--border-radius);
    border: var(--border-light);
    padding: 2.5rem;
    transition: var(--transition-smooth);
    display: flex;
    flex-direction: column;
    height: 100%;
}
.service-detail-card.highlighted {
    border-color: var(--accent-gold);
    box-shadow: 0 0 25px rgba(217, 164, 65, 0.25);
    transform: scale(1.02);
}
.service-detail-card:hover {
    transform: translateY(-5px);
    border-color: var(--accent-gold);
    box-shadow: var(--shadow-lg);
}
.service-card-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1.5rem;
}
.service-card-icon-badge {
    background: var(--bg-light);
    color: var(--accent-gold-dark);
    font-size: 1.5rem;
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
}
.service-card-title {
    font-size: 1.25rem;
    color: var(--primary-navy);
}
.service-card-tagline {
    font-size: 0.85rem;
    color: var(--accent-gold-dark);
    font-weight: 600;
    margin-bottom: 1rem;
}
.service-card-desc {
    font-size: 0.9rem;
    color: var(--text-muted);
    line-height: 1.6;
    margin-bottom: 1.8rem;
    flex: 1;
}
.service-items {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 0.6rem;
    margin-bottom: 2rem;
    border-top: 1px solid rgba(100, 123, 155, 0.1);
    padding-top: 1.5rem;
}
.service-items li {
    font-size: 0.85rem;
    color: var(--text-dark);
    display: flex;
    align-items: start;
    gap: 0.5rem;
    line-height: 1.4;
}
.service-items li::before {
    content: "✦";
    color: var(--accent-gold);
    font-weight: bold;
}
</style>

<!-- ── 1. PAGE HEADER ── -->
<section class="section-padding bg-navy-dark" style="padding-top: 10rem; padding-bottom: 7rem; text-align: center; background-image: linear-gradient(rgba(3,11,22,0.85), rgba(3,11,22,0.95)), url('<?php echo IMG_URL; ?>/hero/mysuru_palace.jpg'); background-size: cover; background-position: center;">
    <div class="container animate-fade-in-up">
        <span class="section-tag" style="color: var(--accent-gold);">Service Catalog</span>
        <h1 style="color: #FFF; font-size: 3rem; margin-bottom: 1rem;" class="display-font">Digital Solutions Built for Growth</h1>
        <p style="color: rgba(255,255,255,0.7); max-width: 700px; margin: 0 auto; font-size: 1.1rem;">From creative logo designs to automated sales funnels, we provide 26 high-impact digital solutions customized for your brand.</p>
    </div>
</section>

<!-- ── 2. SEARCH & FILTER DOCK ── -->
<section class="container">
    <div class="services-search-container animate-scale-in">
        <!-- Text Search Input -->
        <div class="search-input-wrapper">
            <span class="search-icon-fixed">🔍</span>
            <input type="text" id="services-search" class="search-input-field" placeholder="Search services (e.g. Meta Ads, Logo, Shopify, SEO)...">
        </div>
        
        <!-- Category Filter Tabs -->
        <div class="category-tabs-container">
            <button class="category-tab active" data-category="all">All Solutions</button>
            <button class="category-tab" data-category="marketing">Marketing &amp; Ads</button>
            <button class="category-tab" data-category="branding">Branding &amp; Video</button>
            <button class="category-tab" data-category="social">Social Media</button>
            <button class="category-tab" data-category="google">Google Setup</button>
            <button class="category-tab" data-category="tech">Technology</button>
            <button class="category-tab" data-category="reputation">Reputation &amp; PR</button>
        </div>
    </div>
</section>

<!-- ── 3. SERVICES DIRECTORY GRID ── -->
<section class="section-padding" style="padding-top: 3rem;">
    <div class="container">
        <div id="services-grid" class="service-details-grid reveal">
            <?php foreach($services as $srv): 
                // Determine if this service should be highlighted
                $is_highlighted = ($highlight_slug != '' && (
                    strpos(strtolower($srv['title']), strtolower($highlight_slug)) !== false || 
                    $srv['id'] == $highlight_slug
                ));
            ?>
                <div class="service-detail-card <?php echo $is_highlighted ? 'highlighted' : ''; ?>" data-category="<?php echo htmlspecialchars($srv['category']); ?>">
                    <div class="service-card-header">
                        <div class="service-card-icon-badge">
                            <?php echo sprintf("%02d", $srv['id']); ?>
                        </div>
                        <h3 class="service-card-title"><?php echo htmlspecialchars($srv['title']); ?></h3>
                    </div>
                    <div class="service-card-tagline"><?php echo htmlspecialchars($srv['tagline']); ?></div>
                    <p class="service-card-desc"><?php echo htmlspecialchars($srv['description']); ?></p>
                    
                    <ul class="service-items">
                        <?php foreach($srv['items'] as $item): ?>
                            <li><?php echo htmlspecialchars($item); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    
                    <div style="margin-top: auto;">
                        <a href="<?php echo SITE_URL; ?>/contact.php?path=business&service=<?php echo urlencode($srv['title']); ?>" class="btn btn-outline-gold btn-sm" style="width: 100%; text-align: center;">Inquire About This Service</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ── 4. PREMIUM SETUP CTA BANNER ── -->
<section class="section-padding bg-navy-dark">
    <div class="container reveal">
        <div style="background: rgba(10, 34, 70, 0.4); border: var(--border-glow); border-radius: var(--border-radius-lg); padding: 4rem; text-align: center;">
            <span class="section-tag" style="color: var(--accent-gold);">Recommended for Startups</span>
            <h2 style="color: #FFF; font-size: 2.2rem; margin-bottom: 1rem;" class="display-font">Zero-to-Growth Digital Launch Setup</h2>
            <p style="color: rgba(255, 255, 255, 0.7); max-width: 800px; margin: 0 auto 2rem auto; line-height: 1.7;">
                Establish your brand online within weeks. Get logo creation, web launching, Google maps listing, Meta business integrations, analytics mapping, and target messaging setups bundled together in one starter project.
            </p>
            <a href="<?php echo SITE_URL; ?>/contact.php?path=business&service=Zero-to-Growth+Setup" class="btn btn-primary">Claim Your Launch Setup</a>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
