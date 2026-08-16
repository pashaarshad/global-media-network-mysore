/* ============================================================
   Global Media Network Mysore — Core JavaScript Logic
   ============================================================ */

document.addEventListener('DOMContentLoaded', () => {

    // ── 1. Header Shrink & Glow on Scroll ───────────────────
    const header = document.querySelector('.site-header');
    const handleScroll = () => {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    };
    window.addEventListener('scroll', handleScroll);
    handleScroll(); // Initial check on load

    // ── 2. Mobile Menu Toggle ──────────────────────────────
    const menuToggle = document.querySelector('.menu-toggle');
    const mainNav = document.querySelector('.main-nav');
    if (menuToggle && mainNav) {
        menuToggle.addEventListener('click', () => {
            mainNav.classList.toggle('active');
            const isActive = mainNav.classList.contains('active');
            menuToggle.innerHTML = isActive ? '✕' : '☰';
        });
    }

    // ── 3. Scroll Reveal (Intersection Observer) ────────────
    const reveals = document.querySelectorAll('.reveal');
    if (reveals.length > 0) {
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                    revealObserver.unobserve(entry.target); // Trigger once
                }
            });
        }, {
            threshold: 0.15,
            rootMargin: '0px 0px -50px 0px'
        });

        reveals.forEach(el => revealObserver.observe(el));
    }

    // ── 4. Gallery Category Filter ─────────────────────────
    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryCards = document.querySelectorAll('.gallery-card');

    if (filterBtns.length > 0 && galleryCards.length > 0) {
        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Set active class on button
                filterBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                const filterValue = btn.getAttribute('data-filter');

                galleryCards.forEach(card => {
                    const cardCategory = card.getAttribute('data-category');
                    if (filterValue === 'all' || cardCategory === filterValue) {
                        card.style.display = 'block';
                        setTimeout(() => { card.style.opacity = '1'; card.style.transform = 'scale(1)'; }, 50);
                    } else {
                        card.style.opacity = '0';
                        card.style.transform = 'scale(0.9)';
                        setTimeout(() => { card.style.display = 'none'; }, 300);
                    }
                });
            });
        });
    }

    // ── 5. Lightbox Modal Viewer ───────────────────────────
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxClose = document.querySelector('.lightbox-close');

    if (lightbox && lightboxImg) {
        // Open Lightbox
        galleryCards.forEach(card => {
            card.addEventListener('click', () => {
                const img = card.querySelector('img');
                const src = img ? img.getAttribute('src') : '';
                
                // Fallback for placeholder div
                if (src) {
                    lightboxImg.setAttribute('src', src);
                    lightbox.classList.add('active');
                }
            });
        });

        // Close Lightbox
        const closeLightbox = () => {
            lightbox.classList.remove('active');
            setTimeout(() => { lightboxImg.setAttribute('src', ''); }, 300);
        };

        if (lightboxClose) lightboxClose.addEventListener('click', closeLightbox);
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) closeLightbox();
        });
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && lightbox.classList.contains('active')) closeLightbox();
        });
    }

    // ── 6. Services Page Live Text Search & Category Tabs ──
    const servicesSearchInput = document.getElementById('services-search');
    const categoryTabs = document.querySelectorAll('.category-tab');
    const serviceCards = document.querySelectorAll('.service-detail-card');

    if (serviceCards.length > 0) {
        let activeCategory = 'all';
        let searchQuery = '';

        const filterServices = () => {
            serviceCards.forEach(card => {
                const cardCategory = card.getAttribute('data-category');
                const cardTitle = card.querySelector('.service-card-title').textContent.toLowerCase();
                const cardDesc = card.querySelector('.service-card-desc').textContent.toLowerCase();
                
                // Get all checklist items in card
                let itemsText = '';
                card.querySelectorAll('.service-items li').forEach(li => {
                    itemsText += ' ' + li.textContent.toLowerCase();
                });

                const matchesCategory = activeCategory === 'all' || cardCategory === activeCategory;
                const matchesSearch = cardTitle.includes(searchQuery) || cardDesc.includes(searchQuery) || itemsText.includes(searchQuery);

                if (matchesCategory && matchesSearch) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        };

        // Event listener for search input
        if (servicesSearchInput) {
            servicesSearchInput.addEventListener('input', (e) => {
                searchQuery = e.target.value.toLowerCase().trim();
                filterServices();
            });
        }

        // Event listener for category tabs
        if (categoryTabs.length > 0) {
            categoryTabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    categoryTabs.forEach(t => t.classList.remove('active'));
                    tab.classList.add('active');

                    activeCategory = tab.getAttribute('data-category');
                    filterServices();
                });
            });
        }
    }
});
