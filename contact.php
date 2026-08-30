<?php
$page_title = 'Contact Us — Let’s Connect & Tell Your Story';
$page_desc = 'Contact Global Media Network Mysore. Submit your news stories, inquire about business branding, or apply to work with us as a creator.';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/navbar.php';

$success_msg = '';
$error_msg = '';

// Handle Form Submission
if (isset($_GET['action']) && $_GET['action'] === 'submit') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = clean($_POST['name'] ?? '');
        $email = clean($_POST['email'] ?? '');
        $phone = clean($_POST['phone'] ?? '');
        $pathway = clean($_POST['pathway'] ?? 'General Query');
        $subject = clean($_POST['subject'] ?? 'General Inquiry');
        $message = clean($_POST['message'] ?? '');
        $source = clean($_POST['source'] ?? 'contact_page');

        // Capture additional context fields
        $company = clean($_POST['company'] ?? 'N/A');
        $selected_show = clean($_POST['show'] ?? 'N/A');
        $selected_service = clean($_POST['service'] ?? 'N/A');

        if ($name != '' && $email != '' && $phone != '' && $message != '') {
            $submission = [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'pathway' => $pathway,
                'subject' => $subject,
                'company' => $company,
                'selected_show' => $selected_show,
                'selected_service' => $selected_service,
                'message' => $message,
                'source' => $source
            ];

            // Use the JSON helper to store the contact record
            if (append_json_record('contacts.json', $submission)) {
                // If it came from the homepage, redirect back there
                if ($source === 'homepage_cta') {
                    echo "<script>window.location.href = '" . SITE_URL . "/index.php?success=1#contact';</script>";
                } else {
                    echo "<script>window.location.href = '" . SITE_URL . "/contact.php?success=1';</script>";
                }
                exit;
            } else {
                $error_msg = 'There was a technical issue storing your request. Please try again.';
            }
        } else {
            $error_msg = 'Please fill out all required fields marked with *';
        }
    }
}

if (isset($_GET['success']) && $_GET['success'] === '1') {
    $success_msg = 'Thank you for connecting with us! Your message has been logged, and our team will get in touch shortly.';
}

// Pre-fill fields based on query string triggers
$pre_pathway = isset($_GET['path']) ? clean($_GET['path']) : '';
$pre_show = isset($_GET['show']) ? clean($_GET['show']) : '';
$pre_service = isset($_GET['service']) ? clean($_GET['service']) : '';
?>

<!-- ── 1. PAGE HEADER ── -->
<section class="section-padding bg-navy-dark" style="padding-top: 10rem; padding-bottom: 6rem; text-align: center; background-image: linear-gradient(rgba(3,11,22,0.85), rgba(3,11,22,0.95)), url('<?php echo IMG_URL; ?>/hero/mysuru_palace.jpg'); background-size: cover; background-position: center;">
    <div class="container animate-fade-in-up">
        <span class="section-tag" style="color: var(--accent-gold);">Get In Touch</span>
        <h1 style="color: #FFF; font-size: 3rem; margin-bottom: 1rem;" class="display-font">Let's Connect</h1>
        <p style="color: rgba(255,255,255,0.7); max-width: 600px; margin: 0 auto; font-size: 1.1rem;">Have a story to feature, a business to promote, or a partnership idea? We are listening.</p>
    </div>
</section>

<!-- ── 2. THREE PATHWAYS OVERVIEW ── -->
<section class="section-padding" style="padding-bottom: 2rem;">
    <div class="container">
        <div class="services-summary-grid reveal" style="grid-template-columns: repeat(3, 1fr);">
            <!-- Pathway 1: Story -->
            <div style="background:#FFF; padding:2.5rem; border-radius:var(--border-radius); border:var(--border-light); text-align:center; box-shadow:var(--shadow-sm); cursor:pointer;" onclick="setPathway('story', 'Feature a Story')">
                <div style="font-size:2.5rem; margin-bottom:1rem;">📰</div>
                <h3 style="margin-bottom:0.6rem; color:var(--primary-navy);">Feature Your Story</h3>
                <p style="font-size:0.88rem; color:var(--text-muted); line-height:1.6;">Have an inspiring success story, event celebration, public achievement, or local news? Share it with our reporters.</p>
            </div>
            
            <!-- Pathway 2: Business -->
            <div style="background:#FFF; padding:2.5rem; border-radius:var(--border-radius); border:var(--border-light); text-align:center; box-shadow:var(--shadow-sm); cursor:pointer;" onclick="setPathway('business', 'Promote Your Business')">
                <div style="font-size:2.5rem; margin-bottom:1rem;">📈</div>
                <h3 style="margin-bottom:0.6rem; color:var(--primary-navy);">Promote Your Brand</h3>
                <p style="font-size:0.88rem; color:var(--text-muted); line-height:1.6;">Grow your sales with digital campaigns, Google map optimization, professional business cards, logos, or Reels shoots.</p>
            </div>
            
            <!-- Pathway 3: Work -->
            <div style="background:#FFF; padding:2.5rem; border-radius:var(--border-radius); border:var(--border-light); text-align:center; box-shadow:var(--shadow-sm); cursor:pointer;" onclick="setPathway('work', 'Work With Us')">
                <div style="font-size:2.5rem; margin-bottom:1rem;">💼</div>
                <h3 style="margin-bottom:0.6rem; color:var(--primary-navy);">Work With Us</h3>
                <p style="font-size:0.88rem; color:var(--text-muted); line-height:1.6;">Are you a photographer, writer, video creator, student intern, or coordinator? Join Mysore's growing digital media team.</p>
            </div>
        </div>
    </div>
</section>

<!-- ── 3. INTERACTIVE CONTACT FORM ── -->
<section class="section-padding">
    <div class="container">
        <?php if ($success_msg != ''): ?>
            <div style="background: rgba(217, 164, 65, 0.15); border: 1.5px solid var(--accent-gold); border-radius: 8px; padding: 1.5rem; color: var(--accent-gold-light); margin-bottom: 3rem; text-align: center; max-width: 850px; margin-left: auto; margin-right: auto;" class="animate-scale-in">
                <strong>Success!</strong> <?php echo $success_msg; ?>
            </div>
        <?php endif; ?>

        <?php if ($error_msg != ''): ?>
            <div style="background: rgba(235, 87, 87, 0.15); border: 1.5px solid #eb5757; border-radius: 8px; padding: 1.5rem; color: #eb5757; margin-bottom: 3rem; text-align: center; max-width: 850px; margin-left: auto; margin-right: auto;" class="animate-scale-in">
                <strong>Error!</strong> <?php echo $error_msg; ?>
            </div>
        <?php endif; ?>

        <div class="reveal" style="background:#FFF; border-radius:var(--border-radius-lg); border:var(--border-light); box-shadow:var(--shadow-md); display:grid; grid-template-columns:1.2fr 1fr; gap:4rem; overflow:hidden;">
            <!-- Form Side -->
            <div style="padding:4rem;">
                <h2 style="font-size:1.8rem; color:var(--primary-navy); margin-bottom:0.5rem;" id="form-heading">Connect With Our Team</h2>
                <p style="color:var(--text-muted); font-size:0.95rem; margin-bottom:2.5rem;" id="form-subheading">Please select a pathway above or fill out the form below to reach us.</p>
                
                <form id="contact-form" action="<?php echo SITE_URL; ?>/contact.php?action=submit" method="POST" style="display:flex; flex-direction:column; gap:1.2rem;">
                    <input type="hidden" name="source" value="contact_page">
                    <input type="hidden" id="form-pathway" name="pathway" value="<?php echo htmlspecialchars($pre_pathway != '' ? $pre_pathway : 'General Query'); ?>">
                    
                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:1.2rem;">
                        <div>
                            <label style="display:block; font-size:0.85rem; font-weight:600; color:var(--text-dark); margin-bottom:0.4rem;">Your Name *</label>
                            <input type="text" name="name" required placeholder="Enter name" style="width:100%; padding:0.8rem; border-radius:6px; border:1px solid var(--border-light); outline:none; font-family:var(--font-body);">
                        </div>
                        <div>
                            <label style="display:block; font-size:0.85rem; font-weight:600; color:var(--text-dark); margin-bottom:0.4rem;">Company/School Name</label>
                            <input type="text" name="company" placeholder="e.g. Acme Inc." style="width:100%; padding:0.8rem; border-radius:6px; border:1px solid var(--border-light); outline:none; font-family:var(--font-body);">
                        </div>
                    </div>
                    
                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:1.2rem;">
                        <div>
                            <label style="display:block; font-size:0.85rem; font-weight:600; color:var(--text-dark); margin-bottom:0.4rem;">Email Address *</label>
                            <input type="email" name="email" required placeholder="Enter email" style="width:100%; padding:0.8rem; border-radius:6px; border:1px solid var(--border-light); outline:none; font-family:var(--font-body);">
                        </div>
                        <div>
                            <label style="display:block; font-size:0.85rem; font-weight:600; color:var(--text-dark); margin-bottom:0.4rem;">Phone Number *</label>
                            <input type="tel" name="phone" required placeholder="Enter phone" style="width:100%; padding:0.8rem; border-radius:6px; border:1px solid var(--border-light); outline:none; font-family:var(--font-body);">
                        </div>
                    </div>
                    
                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:1.2rem;">
                        <div>
                            <label style="display:block; font-size:0.85rem; font-weight:600; color:var(--text-dark); margin-bottom:0.4rem;">Subject *</label>
                            <input type="text" name="subject" required value="<?php echo htmlspecialchars($pre_show != '' ? 'Show Inquiry: ' . $pre_show : ($pre_service != '' ? 'Service Inquiry: ' . $pre_service : 'Business Collaboration')); ?>" style="width:100%; padding:0.8rem; border-radius:6px; border:1px solid var(--border-light); outline:none; font-family:var(--font-body);">
                        </div>
                        
                        <!-- Dynamic Fields Context -->
                        <div id="dynamic-context-holder">
                            <?php if ($pre_show != ''): ?>
                                <label style="display:block; font-size:0.85rem; font-weight:600; color:var(--text-dark); margin-bottom:0.4rem;">Selected Program</label>
                                <input type="text" name="show" readonly value="<?php echo htmlspecialchars($pre_show); ?>" style="width:100%; padding:0.8rem; border-radius:6px; border:1px solid var(--border-light); background:#F5F5F5; outline:none; font-family:var(--font-body);">
                            <?php elseif ($pre_service != ''): ?>
                                <label style="display:block; font-size:0.85rem; font-weight:600; color:var(--text-dark); margin-bottom:0.4rem;">Selected Service</label>
                                <input type="text" name="service" readonly value="<?php echo htmlspecialchars($pre_service); ?>" style="width:100%; padding:0.8rem; border-radius:6px; border:1px solid var(--border-light); background:#F5F5F5; outline:none; font-family:var(--font-body);">
                            <?php else: ?>
                                <label style="display:block; font-size:0.85rem; font-weight:600; color:var(--text-dark); margin-bottom:0.4rem;">Preferred Service</label>
                                <select name="service" style="width:100%; padding:0.8rem; border-radius:6px; border:1px solid var(--border-light); outline:none; background:#FFF; font-family:var(--font-body);">
                                    <option value="General Consultation">General Consultation</option>
                                    <option value="Branding & Design">Branding &amp; Design</option>
                                    <option value="Google Map / SEO">Google map ranking / SEO</option>
                                    <option value="Video Reels Production">Video / Reels shoot</option>
                                    <option value="Zero-to-Growth Setup">Zero-to-Growth Setup</option>
                                </select>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div>
                        <label style="display:block; font-size:0.85rem; font-weight:600; color:var(--text-dark); margin-bottom:0.4rem;">Write Your Message *</label>
                        <textarea name="message" required rows="5" placeholder="Include as much detail as possible to help us respond with options..." style="width:100%; padding:0.8rem; border-radius:6px; border:1px solid var(--border-light); outline:none; resize:none; font-family:var(--font-body);"></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Send Your Message</button>
                </form>
            </div>
            
            <!-- Contact Details & Map Side -->
            <div style="background:var(--bg-dark); color:#FFF; padding:4rem; display:flex; flex-direction:column; justify-content:space-between;">
                <div>
                    <span class="section-tag" style="color:var(--accent-gold);">Contact Info</span>
                    <h3 style="color:#FFF; font-size:1.8rem; margin-bottom:1.5rem;" class="display-font">Get in Touch Directly</h3>
                    <p style="color:rgba(255,255,255,0.7); font-size:0.95rem; line-height:1.6; margin-bottom:2.5rem;">
                        Feel free to drop by our corporate office or reach us on any of the hotlines listed below.
                    </p>
                    
                    <div class="footer-contact-info" style="gap:2rem;">
                        <div class="contact-item">
                            <span style="font-size:1.5rem; color:var(--accent-gold);">📍</span>
                            <div>
                                <h4 style="color:#FFF; margin-bottom:0.2rem;">Our Address</h4>
                                <p style="color:rgba(255,255,255,0.7); font-size:0.9rem;"><?php echo SITE_ADDRESS; ?></p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <span style="font-size:1.5rem; color:var(--accent-gold);">📞</span>
                            <div>
                                <h4 style="color:#FFF; margin-bottom:0.2rem;">Office Phone</h4>
                                <p style="color:rgba(255,255,255,0.7); font-size:0.9rem;"><?php echo SITE_PHONE; ?></p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <span style="font-size:1.5rem; color:var(--accent-gold);">✉</span>
                            <div>
                                <h4 style="color:#FFF; margin-bottom:0.2rem;">Email Support</h4>
                                <p style="color:rgba(255,255,255,0.7); font-size:0.9rem;"><?php echo SITE_EMAIL; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Social Channels -->
                <div style="border-top:1px solid rgba(255,255,255,0.1); padding-top:2rem; margin-top:3rem;">
                    <h4 style="color:#FFF; font-size:0.9rem; text-transform:uppercase; letter-spacing:1px; margin-bottom:1rem;">Follow Us</h4>
                    <div style="display:flex; gap:0.8rem;">
                        <a href="<?php echo SOCIAL_FACEBOOK; ?>" class="social-icon facebook" style="background:rgba(255,255,255,0.05); color:#FFF; border:var(--border-glow); width:40px; height:40px;" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="<?php echo SOCIAL_INSTAGRAM; ?>" class="social-icon instagram" style="background:rgba(255,255,255,0.05); color:#FFF; border:var(--border-glow); width:40px; height:40px;" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                        <a href="<?php echo SOCIAL_YOUTUBE; ?>" class="social-icon youtube" style="background:rgba(255,255,255,0.05); color:#FFF; border:var(--border-glow); width:40px; height:40px;" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ── JavaScript to control Pathway Selection on Form ── -->
<script>
function setPathway(key, name) {
    // Set form title context
    const formHeading = document.getElementById('form-heading');
    const formSubheading = document.getElementById('form-subheading');
    const pathwayInput = document.getElementById('form-pathway');

    pathwayInput.value = name;

    if(key === 'story') {
        formHeading.textContent = "Feature Your Story";
        formSubheading.textContent = "Tell us about a local event, public achievement, or inspiring community story.";
    } else if(key === 'business') {
        formHeading.textContent = "Promote Your Business";
        formSubheading.textContent = "Let us know which branding, advertising, or web solutions you would like to run.";
    } else if(key === 'work') {
        formHeading.textContent = "Work With Us";
        formSubheading.textContent = "Submit your details to collaborate with us as a photographer, creator, or writer.";
    }
    
    // Smooth scroll down to the form
    document.getElementById('contact-form').scrollIntoView({ behavior: 'smooth', block: 'center' });
}

// Auto set initial prefilled value from URL queries if triggered
document.addEventListener('DOMContentLoaded', () => {
    const prefillPath = "<?php echo $pre_pathway; ?>";
    if(prefillPath === 'story') {
        setPathway('story', 'Feature a Story');
    } else if(prefillPath === 'business') {
        setPathway('business', 'Promote Your Business');
    } else if(prefillPath === 'creator') {
        setPathway('work', 'Work With Us');
    }
});
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
