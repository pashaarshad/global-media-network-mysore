<?php
$nav_services = [
    'Marketing & Ads' => [
        'advertising-analytics' => 'Advertising & Analytics',
        'digital-marketing' => 'Digital Marketing Packages',
        'keyword-seo' => 'Keyword & SEO Research',
        'lead-generation' => 'Lead Generation Services',
        'performance' => 'Performance Marketing',
        'seo' => 'Search Engine SEO'
    ],
    'Branding & Video' => [
        'branding' => 'Branding & Identity',
        'content' => 'Content Creation',
        'ui-ux' => 'UI/UX & Web Design',
        'video-production' => 'Reels & Video Production',
        'video-marketing' => 'Video Marketing Strategy'
    ],
    'Social & Messaging' => [
        'meta' => 'Facebook & Meta Ads',
        'instagram' => 'Instagram Marketing',
        'x-marketing' => 'X / Twitter Campaigns',
        'whatsapp' => 'WhatsApp Automation',
        'youtube' => 'YouTube Management'
    ],
    'Business & Technology' => [
        'ecommerce' => 'E-Commerce Solutions',
        'hosting' => 'Hosting & Maintenance',
        'digital-assets' => 'QR & Digital Assets',
        'recruitment' => 'Recruitment Marketing',
        'training' => 'Training & Consultations'
    ],
    'Corporate & Growth' => [
        'news-pr' => 'News & PR Services',
        'reputation' => 'Reputation Management',
        'zero-to-growth' => 'Zero-to-Growth Setup'
    ]
];
?>
<header class="site-header">
    <div class="container header-container">
        <div class="logo-wrapper">
            <a href="<?php echo SITE_URL; ?>/index.php">
                <img src="<?php echo IMG_URL; ?>/logo.png" alt="Global Media Network Mysuru Logo" class="logo-img">
            </a>
        </div>
        
        <button class="menu-toggle" aria-label="Toggle Navigation">☰</button>
        
        <nav class="main-nav">
            <ul class="nav-list">
                <li><a href="<?php echo SITE_URL; ?>/index.php" class="nav-link <?php echo is_active('index'); ?>">Home</a></li>
                <li><a href="<?php echo SITE_URL; ?>/about.php" class="nav-link <?php echo is_active('about'); ?>">About Us</a></li>
                <li><a href="<?php echo SITE_URL; ?>/channels.php" class="nav-link <?php echo is_active('channels'); ?>">Channels</a></li>
                
                <!-- Mega Dropdown Trigger for 26 Services -->
                <li class="dropdown-holder">
                    <a href="<?php echo SITE_URL; ?>/services.php" class="nav-link <?php echo is_active('services'); ?>">Services <span style="font-size:0.75rem; vertical-align:middle;">▼</span></a>
                    <div class="mega-menu">
                        <?php foreach($nav_services as $cat_title => $sub_links): ?>
                            <div class="mega-column">
                                <h4 class="mega-col-title"><?php echo $cat_title; ?></h4>
                                <ul class="mega-links">
                                    <?php foreach($sub_links as $slug => $title): ?>
                                        <li><a href="<?php echo SITE_URL; ?>/services.php?highlight=<?php echo $slug; ?>"><?php echo $title; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </li>
                
                <li><a href="<?php echo SITE_URL; ?>/gallery.php" class="nav-link <?php echo is_active('gallery'); ?>">Gallery</a></li>
                <li><a href="<?php echo SITE_URL; ?>/clients.php" class="nav-link <?php echo is_active('clients'); ?>">Our Clients</a></li>
                <li><a href="<?php echo SITE_URL; ?>/testimonials.php" class="nav-link <?php echo is_active('testimonials'); ?>">Testimonials</a></li>
                <li><a href="<?php echo SITE_URL; ?>/contact.php" class="nav-link <?php echo is_active('contact'); ?>">Contact Us</a></li>
                
                <li>
                    <a href="<?php echo SITE_URL; ?>/contact.php?path=story" class="btn btn-primary btn-sm" style="padding: 0.5rem 1.2rem; font-size: 0.85rem;">
                        Feature Your Story
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>

<!-- Mobile Navigation Menu Overlay stylesheet rules override -->
<style>
@media (max-width: 992px) {
    .menu-toggle {
        display: block;
    }
    nav.main-nav {
        position: fixed;
        top: 80px;
        right: -100%;
        width: 100%;
        height: calc(100vh - 80px);
        background: var(--bg-dark);
        border-left: 1px solid rgba(217, 164, 65, 0.2);
        transition: var(--transition-smooth);
        padding: 2rem;
        overflow-y: auto;
    }
    nav.main-nav.active {
        right: 0;
    }
    .nav-list {
        flex-direction: column;
        align-items: flex-start;
        gap: 1.5rem;
        width: 100%;
    }
    .nav-link {
        font-size: 1.15rem;
        display: block;
        width: 100%;
    }
    .dropdown-holder:hover .mega-menu {
        display: none; /* Hide mega menu on mobile hover, let them tap Services directly */
    }
    .dropdown-holder .mega-menu {
        display: none;
    }
}
</style>
