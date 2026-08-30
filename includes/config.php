<?php
// ============================================================
// Global Media Network Mysore — Site Configuration
// ============================================================

define('SITE_NAME',    'Global Media Network Mysore');
define('SITE_TAGLINE', 'Connecting Mysore. Informing Communities. Inspiring the World.');
// Dynamically detect domain / protocol (works on localhost/XAMPP and Hostinger out of the box)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || ($_SERVER['SERVER_PORT'] ?? 80) == 443) ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
if (strpos($host, 'localhost') !== false || $host === '127.0.0.1') {
    define('SITE_URL', $protocol . $host . '/global-media-network-mysore');
} else {
    define('SITE_URL', $protocol . $host);
}
define('SITE_EMAIL',   'globalmedianetworkmysore@gmail.com');
define('SITE_PHONE',   '+91 7996961255');
define('SITE_ADDRESS', 'No. 99, 2nd Floor, KG Road, Mysuru, Karnataka – 570006');

define('DATA_DIR',   __DIR__ . '/../data/');
define('ASSETS_URL', SITE_URL . '/assets');
define('IMG_URL',    SITE_URL . '/assets/images');

// ── Active page detection ────────────────────────────────────
$current_page = basename($_SERVER['PHP_SELF'], '.php');

function is_active(string $page): string {
    global $current_page;
    return ($current_page === $page || ($page === 'index' && $current_page === 'index')) ? 'active' : '';
}

// ── Social links (updated) ─────────────────────
define('SOCIAL_FACEBOOK',  'https://www.facebook.com/prime9kannada/');
define('SOCIAL_INSTAGRAM', 'https://www.instagram.com/prime9kannada/');
define('SOCIAL_YOUTUBE',   'https://www.youtube.com/@prime9kannada');
define('SOCIAL_X',         '#');
define('SOCIAL_LINKEDIN',  '#');
define('SOCIAL_WHATSAPP',  '#');
