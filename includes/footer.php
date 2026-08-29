<!-- ── Lightbox Modal Viewer ── -->
<div id="lightbox" class="lightbox">
    <span class="lightbox-close">&times;</span>
    <img id="lightbox-img" class="lightbox-content" src="" alt="Gallery Image Zoom">
</div>

<!-- ── Footer Section ── -->
<footer class="site-footer">
    <div class="container footer-grid">
        <!-- Col 1: Brand Info -->
        <div class="footer-brand">
            <a href="<?php echo SITE_URL; ?>/index.php">
                <img src="<?php echo IMG_URL; ?>/logo.png" alt="Global Media Network Mysuru Logo" style="height: 52px; width: auto; object-fit: contain;">
            </a>
            <p>Global Media Network Mysore is committed to delivering credible information, engaging stories, local updates, entertainment, and meaningful content that connects communities across Mysore and beyond.</p>
            <div class="footer-socials">
                <a href="<?php echo SOCIAL_FACEBOOK; ?>" class="social-icon facebook" aria-label="Facebook" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="<?php echo SOCIAL_INSTAGRAM; ?>" class="social-icon instagram" aria-label="Instagram" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                <a href="<?php echo SOCIAL_YOUTUBE; ?>" class="social-icon youtube" aria-label="YouTube" target="_blank"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>
        
        <!-- Col 2: Navigation Links -->
        <div class="footer-col">
            <h3>Quick Links</h3>
            <ul class="footer-links">
                <li><a href="<?php echo SITE_URL; ?>/index.php">Home</a></li>
                <li><a href="<?php echo SITE_URL; ?>/about.php">About Us</a></li>
                <li><a href="<?php echo SITE_URL; ?>/channels.php">Our Channels</a></li>
                <li><a href="<?php echo SITE_URL; ?>/services.php">Agency Services</a></li>
                <li><a href="<?php echo SITE_URL; ?>/gallery.php">Media Gallery</a></li>
                <li><a href="<?php echo SITE_URL; ?>/clients.php">Our Clients</a></li>
                <li><a href="<?php echo SITE_URL; ?>/testimonials.php">Testimonials</a></li>
                <li><a href="<?php echo SITE_URL; ?>/contact.php">Contact Us</a></li>
            </ul>
        </div>
        
        <!-- Col 3: Channel Segments -->
        <div class="footer-col">
            <h3>Prime 9 Kannada</h3>
            <ul class="footer-links">
                <li><a href="<?php echo SITE_URL; ?>/channels.php#news">Kannada News Segment</a></li>
                <li><a href="<?php echo SITE_URL; ?>/channels.php#journey-junction">Journey Junction</a></li>
                <li><a href="<?php echo SITE_URL; ?>/channels.php#daiva-darshana">Daiva Darshana</a></li>
                <li><a href="<?php echo SITE_URL; ?>/channels.php#business-spotlight">Business Spotlight</a></li>
                <li><a href="<?php echo SITE_URL; ?>/channels.php#campus-crew">Campus Crew</a></li>
                <li><a href="<?php echo SITE_URL; ?>/channels.php#roots-reality">Roots & Reality</a></li>
            </ul>
        </div>
        
        <!-- Col 4: Contact Info -->
        <div class="footer-col">
            <h3>Get In Touch</h3>
            <div class="footer-contact-info">
                <div class="contact-item">
                    <span class="icon">📍</span>
                    <p><?php echo SITE_ADDRESS; ?></p>
                </div>
                <div class="contact-item">
                    <span class="icon">📞</span>
                    <p><?php echo SITE_PHONE; ?><br><?php echo SITE_PHONE2; ?></p>
                </div>
                <div class="contact-item">
                    <span class="icon">✉</span>
                    <p><?php echo SITE_EMAIL; ?></p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> <strong><?php echo SITE_NAME; ?></strong>. All rights reserved. Designed for excellence.</p>
        <div class="footer-legal-links">
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="<?php echo SITE_URL; ?>/contact.php">Work With Us</a>
        </div>
    </div>
</footer>

<!-- Core JS scripts -->
<script src="main.js"></script>
</body>
</html>
