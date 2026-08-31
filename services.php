<?php
$page_title = 'Digital Services — 26 Powerful Web & Marketing Solutions';
$page_desc = 'Explore our catalog of digital services, spanning Brand My Business setups, local SEO, complete branding kits, and The Nation Skill empowerment training.';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';

// Load services data
$services = get_merged_json_data('services.json');

// Check if a highlight parameter is present in URL
$highlight_slug = isset($_GET['highlight']) ? clean($_GET['highlight']) : '';
?>

<!-- Services page specific styles -->
<style>
/* Primary toggle switch styles */
.primary-toggle-section {
    display: flex;
    justify-content: center;
    margin-top: -2.2rem;
    position: relative;
    z-index: 200;
}
.primary-service-toggle-wrapper {
    display: inline-flex;
    background: #071120;
    border: 2px solid rgba(217, 164, 65, 0.25);
    padding: 0.35rem;
    border-radius: 50px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
    gap: 0.35rem;
}
.primary-toggle-btn {
    border: none;
    background: none;
    font-family: var(--font-heading);
    font-size: 1.05rem;
    font-weight: 700;
    color: var(--text-muted);
    padding: 0.8rem 2.2rem;
    border-radius: 50px;
    cursor: pointer;
    transition: var(--transition-smooth);
    display: flex;
    align-items: center;
    gap: 0.8rem;
    outline: none;
}
.primary-toggle-btn.active {
    background: var(--accent-gold);
    color: var(--primary-navy-dark);
    box-shadow: 0 4px 15px rgba(217, 164, 65, 0.35);
}
.primary-toggle-btn:hover:not(.active) {
    color: #FFF;
    background: rgba(255, 255, 255, 0.05);
}

/* Primary section visibility */
.primary-service-content {
    display: none;
}
.primary-service-content.active {
    display: block;
    animation: fadeInService 0.5s ease forwards;
}

@keyframes fadeInService {
    from { opacity: 0; transform: translateY(15px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Brand My Business styles */
.services-search-container {
    background: #FFF;
    border-radius: var(--border-radius-lg);
    border: var(--border-light);
    box-shadow: var(--shadow-sm);
    padding: 2rem;
    margin-top: 2rem;
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
    margin-top: 3rem;
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

/* The Nation Skill styles */
.nation-skill-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 2.5rem;
    margin-top: 3.5rem;
}
.nation-skill-card {
    background: #FFF;
    border-radius: var(--border-radius-lg);
    border: var(--border-light);
    padding: 3rem;
    transition: var(--transition-smooth);
    display: flex;
    flex-direction: column;
}
.nation-skill-card:hover {
    transform: translateY(-5px);
    border-color: var(--accent-gold);
    box-shadow: var(--shadow-lg);
}
.skill-card-badge {
    background: var(--bg-light);
    color: var(--accent-gold-dark);
    font-size: 1rem;
    font-weight: 800;
    padding: 0.4rem 1rem;
    border-radius: 50px;
    display: inline-block;
    align-self: flex-start;
    margin-bottom: 1.5rem;
}
.skill-card-title {
    font-family: var(--font-heading);
    color: var(--primary-navy);
    font-size: 1.5rem;
    font-weight: 800;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.8rem;
}
.skill-card-title i {
    color: var(--accent-gold);
}
.skill-card-desc {
    font-size: 0.95rem;
    color: var(--text-muted);
    line-height: 1.7;
    margin-bottom: 2rem;
    flex: 1;
}

@media (max-width: 990px) {
    .service-details-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .nation-skill-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
}
@media (max-width: 768px) {
    .service-details-grid {
        grid-template-columns: 1fr;
    }
    .services-search-container {
        padding: 1.5rem;
    }
    .primary-toggle-btn {
        padding: 0.75rem 1.4rem;
        font-size: 0.95rem;
    }
}
</style>

<!-- ── 1. PAGE HEADER ── -->
<section class="section-padding bg-navy-dark" style="padding-top: 10rem; padding-bottom: 7rem; text-align: center; background-image: linear-gradient(rgba(3,11,22,0.85), rgba(3,11,22,0.95)), url('<?php echo IMG_URL; ?>/hero/mysuru_palace.jpg'); background-size: cover; background-position: center;">
    <div class="container animate-fade-in-up">
        <span class="section-tag" style="color: var(--accent-gold);">Service Options</span>
        <h1 style="color: #FFF; font-size: 3rem; margin-bottom: 1rem;" class="display-font">Corporate &amp; Career Initiatives</h1>
        <p style="color: rgba(255,255,255,0.7); max-width: 700px; margin: 0 auto; font-size: 1.1rem;">Choose between Brand My Business solutions for corporate identity and The Nation Skill program for community development.</p>
    </div>
</section>

<!-- ── 2. PRIMARY TOGGLE BAR ── -->
<div class="primary-toggle-section">
    <div class="primary-service-toggle-wrapper">
        <button class="primary-toggle-btn active" data-target="brand-my-business">
            <i class="fa-solid fa-briefcase"></i> Brand My Business
        </button>
        <button class="primary-toggle-btn" data-target="the-nation-skill">
            <i class="fa-solid fa-graduation-cap"></i> The Nation Skill
        </button>
    </div>
</div>

<!-- ── 3. CONTENT AREA: BRAND MY BUSINESS ── -->
<div id="section-brand-my-business" class="primary-service-content active">
    
    <!-- Introduction Panel -->
    <section class="section-padding" style="padding-bottom: 0;">
        <div class="container text-center">
            <span class="section-tag" style="color: var(--accent-gold);">Your Business. Your Identity. Your Growth.</span>
            <h2 class="display-font" style="color: var(--primary-navy); font-size: 2.5rem; margin-top: 0.5rem; font-weight: 800;">Brand My Business</h2>
            <p style="color: var(--text-muted); max-width: 850px; margin: 1rem auto 1.5rem auto; line-height: 1.7; font-size: 1.05rem;">
                Brand My Business is a business-focused segment created to help entrepreneurs, startups, local businesses, and growing brands strengthen their identity and reach the right audience. We showcase the story behind the business, its products and services, unique strengths, customer value, and growth journey through engaging digital content and strategic promotion.
            </p>
            <div style="font-weight: 700; color: var(--accent-gold-dark); font-size: 1.1rem; letter-spacing: 0.5px; text-transform: uppercase;">
                Build Your Identity • Showcase Your Strength • Grow Your Brand
            </div>
        </div>
    </section>

    <!-- Search & Filters -->
    <section class="container" style="margin-top: 2rem;">
        <div class="services-search-container animate-scale-in">
            <div class="search-input-wrapper">
                <span class="search-icon-fixed">🔍</span>
                <input type="text" id="services-search" class="search-input-field" placeholder="Search services (e.g. Meta Ads, Logo, Shopify, SEO)...">
            </div>
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

    <!-- Services Grid -->
    <section class="section-padding" style="padding-top: 2rem;">
        <div class="container">
            <div id="services-grid" class="service-details-grid">
                <?php 
                $count = 0;
                foreach($services as $srv): 
                    // Skip Meta Services (Brand My Business & The Nation Skill) from the catalog list
                    if ($srv['id'] == 27 || $srv['id'] == 28) continue;
                    $count++;
                    
                    $is_highlighted = ($highlight_slug != '' && (
                        strpos(strtolower($srv['title']), strtolower($highlight_slug)) !== false || 
                        $srv['id'] == $highlight_slug
                    ));
                ?>
                    <div class="service-detail-card <?php echo $is_highlighted ? 'highlighted' : ''; ?>" data-category="<?php echo htmlspecialchars($srv['category']); ?>">
                        <div class="service-card-header">
                            <div class="service-card-icon-badge">
                                <?php echo sprintf("%02d", $count); ?>
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

</div>

<!-- ── 4. CONTENT AREA: THE NATION SKILL ── -->
<div id="section-the-nation-skill" class="primary-service-content">
    
    <!-- Introduction Panel -->
    <section class="section-padding" style="padding-bottom: 0;">
        <div class="container text-center">
            <span class="section-tag" style="color: var(--accent-gold);">Learn. Empower. Achieve.</span>
            <h2 class="display-font" style="color: var(--primary-navy); font-size: 2.5rem; margin-top: 0.5rem; font-weight: 800;">The Nation Skill</h2>
            <p style="color: var(--text-muted); max-width: 850px; margin: 1rem auto 1.5rem auto; line-height: 1.7; font-size: 1.05rem;">
                The Nation Skill is a career and empowerment initiative designed to connect students, women, and children with practical learning, skill development, career opportunities, and meaningful activities. Through training programmes, employment awareness, empowerment initiatives, and engaging learning experiences, we aim to help individuals build confidence, discover opportunities, and prepare for a stronger future.
            </p>
            <div style="font-weight: 700; color: var(--accent-gold-dark); font-size: 1.1rem; letter-spacing: 0.5px; text-transform: uppercase;">
                Building Skills • Creating Opportunities • Empowering the Nation
            </div>
        </div>
    </section>

    <!-- Nation Skill Grid -->
    <section class="section-padding" style="padding-top: 2rem;">
        <div class="container">
            <div class="nation-skill-grid">
                
                <!-- Card 1: Job Requirements -->
                <div class="nation-skill-card">
                    <div class="skill-card-badge">01. CAREERS</div>
                    <h3 class="skill-card-title">
                        <i class="fa-solid fa-briefcase"></i> Job Requirements
                    </h3>
                    <p class="skill-card-desc">
                        Stay updated with employment opportunities, industry expectations, required skills, recruitment trends, and career pathways. We help students and job seekers understand what employers are looking for and prepare themselves accordingly.
                    </p>
                    <div style="margin-top: auto;">
                        <a href="<?php echo SITE_URL; ?>/contact.php?path=skill&service=Job+Requirements" class="btn btn-outline-gold btn-sm" style="width:100%; text-align:center;">Inquire / Stay Updated</a>
                    </div>
                </div>

                <!-- Card 2: Student Training -->
                <div class="nation-skill-card">
                    <div class="skill-card-badge">02. EDUCATION</div>
                    <h3 class="skill-card-title">
                        <i class="fa-solid fa-graduation-cap"></i> Student Training
                    </h3>
                    <p class="skill-card-desc">
                        Practical training programmes focused on employability, communication, technology, career readiness, professional skills, and personal development. Our goal is to bridge the gap between academic learning and real-world career requirements.
                    </p>
                    <div style="margin-top: auto;">
                        <a href="<?php echo SITE_URL; ?>/contact.php?path=skill&service=Student+Training" class="btn btn-outline-gold btn-sm" style="width:100%; text-align:center;">Register for Training</a>
                    </div>
                </div>

                <!-- Card 3: Women Empowerment -->
                <div class="nation-skill-card">
                    <div class="skill-card-badge">03. LEADERSHIP</div>
                    <h3 class="skill-card-title">
                        <i class="fa-solid fa-hands-holding-child"></i> Women Empowerment
                    </h3>
                    <p class="skill-card-desc">
                        Empowering women through skill development, entrepreneurship awareness, career guidance, digital literacy, and opportunities for personal and professional growth. We aim to encourage confidence, independence, leadership, and economic participation.
                    </p>
                    <div style="margin-top: auto;">
                        <a href="<?php echo SITE_URL; ?>/contact.php?path=skill&service=Women+Empowerment" class="btn btn-outline-gold btn-sm" style="width:100%; text-align:center;">Explore Initiatives</a>
                    </div>
                </div>

                <!-- Card 4: Children Activities -->
                <div class="nation-skill-card">
                    <div class="skill-card-badge">04. CREATIVITY</div>
                    <h3 class="skill-card-title">
                        <i class="fa-solid fa-puzzle-piece"></i> Children Activities
                    </h3>
                    <p class="skill-card-desc">
                        Creative, educational, and skill-building activities designed to encourage curiosity, confidence, teamwork, communication, and learning beyond the classroom. Programmes can include competitions, workshops, creativity-based activities, awareness programmes, and talent development.
                    </p>
                    <div style="margin-top: auto;">
                        <a href="<?php echo SITE_URL; ?>/contact.php?path=skill&service=Children+Activities" class="btn btn-outline-gold btn-sm" style="width:100%; text-align:center;">Join Next Activity</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>

<!-- ── 5. PREMIUM SETUP CTA BANNER ── -->
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

<!-- Toggle Controller JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const toggleBtns = document.querySelectorAll('.primary-toggle-btn');
    const sections = document.querySelectorAll('.primary-service-content');
    
    toggleBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const target = btn.getAttribute('data-target');
            
            // Toggle active classes on buttons
            toggleBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            
            // Toggle visibility of sections
            sections.forEach(sec => {
                if (sec.id === `section-${target}`) {
                    sec.classList.add('active');
                } else {
                    sec.classList.remove('active');
                }
            });
        });
    });
});
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
