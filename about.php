<?php
$page_title = 'About Us — Media That Connects People';
$page_desc = 'Discover the mission, vision, values, and commitments of Global Media Network Mysore — Mysuru’s premier digital communication network.';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';
?>

<!-- ── 1. PAGE HEADER ── -->
<section class="section-padding bg-navy-dark" style="padding-top: 10rem; padding-bottom: 6rem; text-align: center; background-image: linear-gradient(rgba(3,11,22,0.85), rgba(3,11,22,0.95)), url('<?php echo IMG_URL; ?>/hero/mysuru_palace.jpg'); background-size: cover; background-position: center;">
    <div class="container animate-fade-in-up">
        <span class="section-tag" style="color: var(--accent-gold);">Who We Are</span>
        <h1 style="color: #FFF; font-size: 3rem; margin-bottom: 1rem;" class="display-font">Media That Connects People</h1>
        <p style="color: rgba(255,255,255,0.7); max-width: 600px; margin: 0 auto; font-size: 1.1rem;">Discover the story, mission, vision, and core team behind Mysuru's fastest-growing digital platform.</p>
    </div>
</section>

<!-- ── 2. WHO WE ARE ── -->
<section class="section-padding">
    <div class="container reveal">
        <div style="display: grid; grid-template-columns: 1fr 1.1fr; gap: 4rem; align-items: center;">
            <div class="relative" style="height: 420px; border-radius: var(--border-radius-lg); overflow: hidden; border: 3px solid #FFF; box-shadow: var(--shadow-lg);">
                <img src="<?php echo IMG_URL; ?>/hero/mysuru_palace.jpg" alt="Mysuru Palace Editorial Photo" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            
            <div>
                <span class="section-tag">About Global Media Network</span>
                <h2 class="section-title" style="margin-bottom: 1.5rem;">Connecting Mysore. Inspiring the World.</h2>
                <p style="color: var(--text-dark); font-size: 1.1rem; line-height: 1.7; margin-bottom: 1.2rem;">
                    Global Media Network Mysore is a growing media and digital communication platform created with the vision of providing informative, responsible, engaging, and community-focused content.
                </p>
                <p style="color: var(--text-muted); line-height: 1.6; margin-bottom: 1.5rem;">
                    We believe media should do more than simply communicate information. It should educate, inspire, connect communities, promote positive initiatives, and create opportunities for meaningful engagement.
                </p>
                <p style="color: var(--text-muted); line-height: 1.6;">
                    Our platform highlights the people, organizations, institutions, businesses, events, achievements, and stories that contribute to the growth and identity of Mysore.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ── 3. VISION & MISSION ── -->
<section class="section-padding bg-light">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem;">
            <!-- Vision Card -->
            <div class="reveal" style="background:#FFF; padding:3.5rem; border-radius:var(--border-radius-lg); border:var(--border-light); box-shadow:var(--shadow-sm);">
                <span style="font-size:3rem; display:block; margin-bottom:1.5rem;">👁️‍🗨️</span>
                <h2 style="font-size:1.8rem; margin-bottom:1.2rem; color:var(--primary-navy);">Our Vision</h2>
                <p style="color:var(--text-muted); line-height:1.75; font-size:1.05rem;">
                    To become a trusted and influential digital media network from Mysore, connecting local stories with a wider audience through responsible journalism, creative communication, and innovative digital media solutions.
                </p>
            </div>
            
            <!-- Mission Card -->
            <div class="reveal delay-1" style="background:#FFF; padding:3.5rem; border-radius:var(--border-radius-lg); border:var(--border-light); box-shadow:var(--shadow-sm);">
                <span style="font-size:3rem; display:block; margin-bottom:1.5rem;">🎯</span>
                <h2 style="font-size:1.8rem; margin-bottom:1.2rem; color:var(--primary-navy);">Our Mission</h2>
                <ul style="list-style:none; display:flex; flex-direction:column; gap:0.8rem; color:var(--text-muted); line-height:1.6;">
                    <li style="display:flex; gap:0.6rem; align-items:start;"><span style="color:var(--accent-gold-dark); font-weight:bold;">✔</span> Deliver timely, relevant, and meaningful digital content.</li>
                    <li style="display:flex; gap:0.6rem; align-items:start;"><span style="color:var(--accent-gold-dark); font-weight:bold;">✔</span> Promote Mysore's rich culture, institutions, and businesses.</li>
                    <li style="display:flex; gap:0.6rem; align-items:start;"><span style="color:var(--accent-gold-dark); font-weight:bold;">✔</span> Provide a platform for inspiring individuals &amp; achievements.</li>
                    <li style="display:flex; gap:0.6rem; align-items:start;"><span style="color:var(--accent-gold-dark); font-weight:bold;">✔</span> Encourage responsible, creative, and positive communication.</li>
                    <li style="display:flex; gap:0.6rem; align-items:start;"><span style="color:var(--accent-gold-dark); font-weight:bold;">✔</span> Support businesses through effective digital marketing promotions.</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ── 4. WHY GLOBAL MEDIA NETWORK MYSORE? ── -->
<section class="section-padding">
    <div class="container">
        <div class="section-header text-center reveal">
            <span class="section-tag">Our Pillars</span>
            <h2 class="section-title">Local Stories. Wider Reach.</h2>
            <p class="section-desc">We combine the power of local understanding with digital communication to create content that is informative, relevant, and engaging.</p>
        </div>
        
        <div class="services-summary-grid reveal" style="grid-template-columns: repeat(5, 1fr); gap: 1.2rem;">
            <!-- Pillar 1 -->
            <div style="background:#FFF; padding:2rem 1.5rem; border-radius:var(--border-radius); border:var(--border-light); text-align:center; box-shadow:var(--shadow-sm);">
                <div style="font-size:2rem; margin-bottom:1rem;">🛡️</div>
                <h4 style="margin-bottom:0.6rem; font-size:1.1rem; color:var(--primary-navy);">Credibility</h4>
                <p style="font-size:0.85rem; color:var(--text-muted); line-height:1.5;">Content presented with responsibility, accuracy, and professionalism.</p>
            </div>
            
            <!-- Pillar 2 -->
            <div style="background:#FFF; padding:2rem 1.5rem; border-radius:var(--border-radius); border:var(--border-light); text-align:center; box-shadow:var(--shadow-sm);">
                <div style="font-size:2rem; margin-bottom:1rem;">🤝</div>
                <h4 style="margin-bottom:0.6rem; font-size:1.1rem; color:var(--primary-navy);">Connection</h4>
                <p style="font-size:0.85rem; color:var(--text-muted); line-height:1.5;">Giving visibility to local stories and community initiatives that deserve recognition.</p>
            </div>
            
            <!-- Pillar 3 -->
            <div style="background:#FFF; padding:2rem 1.5rem; border-radius:var(--border-radius); border:var(--border-light); text-align:center; box-shadow:var(--shadow-sm);">
                <div style="font-size:2rem; margin-bottom:1rem;">📡</div>
                <h4 style="margin-bottom:0.6rem; font-size:1.1rem; color:var(--primary-navy);">Digital Reach</h4>
                <p style="font-size:0.85rem; color:var(--text-muted); line-height:1.5;">Connecting audiences through social media, video platforms, and websites.</p>
            </div>
            
            <!-- Pillar 4 -->
            <div style="background:#FFF; padding:2rem 1.5rem; border-radius:var(--border-radius); border:var(--border-light); text-align:center; box-shadow:var(--shadow-sm);">
                <div style="font-size:2rem; margin-bottom:1rem;">✨</div>
                <h4 style="margin-bottom:0.6rem; font-size:1.1rem; color:var(--primary-navy);">Storytelling</h4>
                <p style="font-size:0.85rem; color:var(--text-muted); line-height:1.5;">Presenting information in a highly engaging and audience-friendly format.</p>
            </div>
            
            <!-- Pillar 5 -->
            <div style="background:#FFF; padding:2rem 1.5rem; border-radius:var(--border-radius); border:var(--border-light); text-align:center; box-shadow:var(--shadow-sm);">
                <div style="font-size:2rem; margin-bottom:1rem;">🌱</div>
                <h4 style="margin-bottom:0.6rem; font-size:1.1rem; color:var(--primary-navy);">Positive Impact</h4>
                <p style="font-size:0.85rem; color:var(--text-muted); line-height:1.5;">Promoting achievements, local events, awareness, and constructive ideas.</p>
            </div>
        </div>
    </div>
</section>

<!-- ── 5. OUR COMMITMENT ── -->
<section class="section-padding bg-navy-dark" style="position:relative; overflow:hidden;">
    <div class="container reveal">
        <div style="max-width: 800px; margin: 0 auto; text-align: center;">
            <span class="section-tag" style="color:var(--accent-gold);">Our Pledge</span>
            <h2 style="color:#FFF; font-size:2.4rem; margin-bottom:1.5rem;" class="display-font">Our Commitment to Mysore</h2>
            <p style="color:rgba(255,255,255,0.85); font-size:1.2rem; line-height:1.8; margin-bottom:2.5rem; font-style:italic;">
                "At Global Media Network Mysore, we are committed to maintaining responsible communication, accuracy, professionalism, inclusiveness, and respect for our audience. We continuously work towards creating a platform where meaningful information and engaging storytelling come together."
            </p>
            <div style="display:flex; justify-content:center; gap:1.5rem;">
                <a href="<?php echo SITE_URL; ?>/contact.php?path=story" class="btn btn-primary">Feature Your Story</a>
                <a href="<?php echo SITE_URL; ?>/contact.php" class="btn btn-secondary">Get in Touch With Us</a>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
