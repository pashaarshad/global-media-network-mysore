<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Primary SEO Meta Tags -->
    <title><?php echo isset($page_title) ? $page_title . ' | ' . SITE_NAME : SITE_NAME . ' — ' . SITE_TAGLINE; ?></title>
    <meta name="description" content="<?php echo isset($page_desc) ? $page_desc : 'Global Media Network Mysore is a premium digital media and communication network. We specialize in digital marketing, news broadcasting, spiritual tours, educational features, and custom tech setups.'; ?>">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo SITE_URL; ?>">
    <meta property="og:title" content="<?php echo isset($page_title) ? $page_title : SITE_NAME; ?>">
    <meta property="og:description" content="Discover Mysore. Celebrate Stories. Connect Globally. Core regional media network and professional digital agency services.">
    <meta property="og:image" content="<?php echo IMG_URL; ?>/hero/mysuru_palace.jpg">

    <!-- Fonts and Icons -->
    <link rel="icon" type="image/png" href="<?php echo IMG_URL; ?>/logo.png">
    
    <!-- Icon Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Custom CSS stylesheets -->
    <link rel="stylesheet" href="style.css?v=1.5">
    <link rel="stylesheet" href="animations.css?v=1.5">
    <link rel="stylesheet" href="responsive.css?v=1.5">
    
    <!-- Page Specific Dynamic Styles -->
    <?php if (isset($extra_css)): ?>
        <?php echo $extra_css; ?>
    <?php endif; ?>
</head>
<body>
