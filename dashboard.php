<?php
$page_title = 'Admin Dashboard';
require_once __DIR__ . '/includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard — Global Media Network</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-dark: #030B16;
            --sidebar-bg: #071120;
            --card-bg: #0b1a2f;
            --accent-gold: #D9A441;
            --accent-gold-hover: #f1c366;
            --text-light: #F4F6F9;
            --text-muted: #8E9BAE;
            --border-color: rgba(217, 164, 65, 0.15);
            --border-glow: 0 0 15px rgba(217, 164, 65, 0.1);
            --transition-smooth: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-dark);
            color: var(--text-light);
            display: flex;
            min-height: 100vh;
        }

        /* ── SIDEBAR ── */
        .sidebar {
            width: 280px;
            background-color: var(--sidebar-bg);
            border-right: 1.5px solid var(--border-color);
            display: flex;
            flex-direction: column;
            padding: 2rem 1.5rem;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            z-index: 100;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 3rem;
        }

        .sidebar-brand i {
            color: var(--accent-gold);
            font-size: 1.8rem;
        }

        .sidebar-brand span {
            font-size: 1.25rem;
            font-weight: 800;
            letter-spacing: 0.5px;
            background: linear-gradient(135deg, #FFF 0%, var(--accent-gold) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .sidebar-menu {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .menu-item button {
            width: 100%;
            background: none;
            border: none;
            color: var(--text-muted);
            padding: 1rem 1.25rem;
            border-radius: 8px;
            font-size: 0.95rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 1rem;
            cursor: pointer;
            transition: var(--transition-smooth);
            text-align: left;
        }

        .menu-item button:hover,
        .menu-item.active button {
            color: var(--text-light);
            background-color: rgba(217, 164, 65, 0.1);
        }

        .menu-item.active button i {
            color: var(--accent-gold);
        }

        .sidebar-footer {
            margin-top: auto;
            border-top: 1px solid var(--border-color);
            padding-top: 1.5rem;
        }

        .sidebar-footer a {
            color: var(--accent-gold);
            text-decoration: none;
            font-weight: 700;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: var(--transition-smooth);
        }

        .sidebar-footer a:hover {
            color: var(--accent-gold-hover);
        }

        /* ── MAIN CONTENT ── */
        .main-content {
            margin-left: 280px;
            flex: 1;
            padding: 3rem;
            max-width: 1200px;
        }

        header {
            margin-bottom: 3rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            font-weight: 700;
        }

        header p {
            color: var(--text-muted);
            font-size: 0.95rem;
            margin-top: 0.25rem;
        }

        .tab-content {
            display: none;
            animation: fadeIn 0.4s ease;
        }

        .tab-content.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ── DASHBOARD GRID ── */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 2.5rem;
        }

        .card {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 2rem;
            box-shadow: var(--border-glow);
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .card-title i {
            color: var(--accent-gold);
        }

        /* ── FORM ELEMENTS ── */
        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-group label {
            display: block;
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-muted);
            margin-bottom: 0.5rem;
        }

        .form-control {
            width: 100%;
            background-color: rgba(3, 11, 22, 0.5);
            border: 1px solid var(--border-color);
            border-radius: 6px;
            color: var(--text-light);
            padding: 0.8rem 1rem;
            font-family: inherit;
            font-size: 0.95rem;
            transition: var(--transition-smooth);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--accent-gold);
            box-shadow: 0 0 10px rgba(217, 164, 65, 0.2);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        .radio-group {
            display: flex;
            gap: 1.5rem;
            margin-top: 0.5rem;
        }

        .radio-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            font-size: 0.95rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            background-color: var(--accent-gold);
            color: var(--bg-dark);
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 6px;
            font-weight: 700;
            font-size: 0.95rem;
            cursor: pointer;
            transition: var(--transition-smooth);
            width: 100%;
        }

        .btn:hover {
            background-color: var(--accent-gold-hover);
        }

        .btn-danger {
            background-color: #e63946;
            color: #FFF;
        }

        .btn-danger:hover {
            background-color: #ff4d5a;
        }

        /* ── DATA TABLES & LISTS ── */
        .items-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            max-height: 550px;
            overflow-y: auto;
            padding-right: 0.5rem;
        }

        .item-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: rgba(3, 11, 22, 0.4);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 1rem;
            transition: var(--transition-smooth);
        }

        .item-row:hover {
            border-color: rgba(217, 164, 65, 0.3);
        }

        .item-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .item-img {
            width: 60px;
            height: 60px;
            border-radius: 6px;
            object-fit: cover;
            background-color: #030B16;
            border: 1px solid var(--border-color);
        }

        .item-details h4 {
            font-size: 0.95rem;
            font-weight: 700;
            margin-bottom: 0.2rem;
        }

        .item-details p {
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        .action-btn {
            background: none;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
            font-size: 1.1rem;
            padding: 0.5rem;
            border-radius: 4px;
            transition: var(--transition-smooth);
        }

        .action-btn:hover {
            color: #e63946;
            background-color: rgba(230, 57, 70, 0.1);
        }

        /* ── STAR RATING SELECTOR ── */
        .stars-select {
            display: flex;
            gap: 0.5rem;
            font-size: 1.5rem;
            color: var(--text-muted);
            cursor: pointer;
        }

        .stars-select i.active {
            color: var(--accent-gold);
        }

        /* ── CUSTOM SCROLLBAR ── */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: rgba(3, 11, 22, 0.2);
        }
        ::-webkit-scrollbar-thumb {
            background: var(--border-color);
            border-radius: 3px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: var(--accent-gold);
        }
    </style>
</head>
<body>

    <!-- Sidebar Navigation -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <i class="fa-solid fa-sliders"></i>
            <span>GMN Admin</span>
        </div>
        <ul class="sidebar-menu">
            <li class="sidebar-menu-item menu-item active" data-tab="gallery">
                <button><i class="fa-solid fa-images"></i> Gallery Manager</button>
            </li>
            <li class="sidebar-menu-item menu-item" data-tab="clients">
                <button><i class="fa-solid fa-handshake"></i> Clients Manager</button>
            </li>
            <li class="sidebar-menu-item menu-item" data-tab="services">
                <button><i class="fa-solid fa-briefcase"></i> Services Manager</button>
            </li>
            <li class="sidebar-menu-item menu-item" data-tab="testimonials">
                <button><i class="fa-solid fa-comment-dots"></i> Testimonials</button>
            </li>
        </ul>
        <div class="sidebar-footer">
            <a href="index.php" target="_blank"><i class="fa-solid fa-arrow-up-right-from-square"></i> Visit Website</a>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="main-content">
        
        <!-- ── TAB: GALLERY ── -->
        <div id="tab-gallery" class="tab-content active">
            <header>
                <div>
                    <h1>Gallery Manager</h1>
                    <p>Upload and manage images displayed in the live photo gallery archive.</p>
                </div>
            </header>
            <div class="dashboard-grid">
                <div class="card">
                    <div class="card-title"><i class="fa-solid fa-upload"></i> Upload Image</div>
                    <form id="form-gallery" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Image File</label>
                            <input type="file" name="image" class="form-control" accept="image/*" required>
                        </div>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter image title" required>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" class="form-control">
                                <option value="news">News Coverage</option>
                                <option value="prime9">Prime 9 Shows</option>
                                <option value="events">Events &amp; festivals</option>
                                <option value="business">Business spotlights</option>
                                <option value="campus">Campus crew</option>
                                <option value="culture">Culture &amp; Heritage</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Orientation</label>
                            <div class="radio-group">
                                <label class="radio-label">
                                    <input type="radio" name="orientation" value="horizontal" checked> Horizontal (Landscape)
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="orientation" value="vertical"> Vertical (Portrait)
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn"><i class="fa-solid fa-plus"></i> Add to Gallery</button>
                    </form>
                </div>
                <div class="card">
                    <div class="card-title"><i class="fa-solid fa-list"></i> Uploaded Photos</div>
                    <div class="items-list" id="list-gallery"></div>
                </div>
            </div>
        </div>

        <!-- ── TAB: CLIENTS ── -->
        <div id="tab-clients" class="tab-content">
            <header>
                <div>
                    <h1>Clients Manager</h1>
                    <p>Add logos of Mysore businesses and partners to our homepage carousel.</p>
                </div>
            </header>
            <div class="dashboard-grid">
                <div class="card">
                    <div class="card-title"><i class="fa-solid fa-plus-circle"></i> Add Client</div>
                    <form id="form-clients" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Client Name</label>
                            <input type="text" name="name" class="form-control" placeholder="e.g. Mysore Palace Hotel" required>
                        </div>
                        <div class="form-group">
                            <label>Logo (Transparent PNG preferred)</label>
                            <input type="file" name="logo" class="form-control" accept="image/*" required>
                        </div>
                        <button type="submit" class="btn"><i class="fa-solid fa-plus"></i> Add Client</button>
                    </form>
                </div>
                <div class="card">
                    <div class="card-title"><i class="fa-solid fa-handshake"></i> Partners &amp; Clients</div>
                    <div class="items-list" id="list-clients"></div>
                </div>
            </div>
        </div>

        <!-- ── TAB: SERVICES ── -->
        <div id="tab-services" class="tab-content">
            <header>
                <div>
                    <h1>Services Manager</h1>
                    <p>Edit or add commercial and digital services offered by Global Media.</p>
                </div>
            </header>
            <div class="dashboard-grid">
                <div class="card">
                    <div class="card-title"><i class="fa-solid fa-plus-circle"></i> Create Service</div>
                    <form id="form-services">
                        <div class="form-group">
                            <label>Service Title</label>
                            <input type="text" name="title" class="form-control" placeholder="e.g. High-definition videography" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="desc" class="form-control" placeholder="Brief details about service..." required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" class="form-control">
                                <option value="production">Production &amp; Broadcast</option>
                                <option value="digital">Digital &amp; Social Marketing</option>
                                <option value="consulting">Ad Consulting &amp; Events</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Features (Comma separated)</label>
                            <input type="text" name="items" class="form-control" placeholder="e.g. 4K Camera, Professional Audio, Live Mixing">
                        </div>
                        <button type="submit" class="btn"><i class="fa-solid fa-plus"></i> Add Service</button>
                    </form>
                </div>
                <div class="card">
                    <div class="card-title"><i class="fa-solid fa-briefcase"></i> Active Services</div>
                    <div class="items-list" id="list-services"></div>
                </div>
            </div>
        </div>

        <!-- ── TAB: TESTIMONIALS ── -->
        <div id="tab-testimonials" class="tab-content">
            <header>
                <div>
                    <h1>Testimonials Manager</h1>
                    <p>Review or publish client and partner success stories.</p>
                </div>
            </header>
            <div class="dashboard-grid">
                <div class="card">
                    <div class="card-title"><i class="fa-solid fa-plus-circle"></i> Add Testimonial</div>
                    <form id="form-testimonials">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="e.g. Dr. Harish Kumar" required>
                        </div>
                        <div class="form-group">
                            <label>Role / Company</label>
                            <input type="text" name="role" class="form-control" placeholder="e.g. Director, Chamundi Resorts" required>
                        </div>
                        <div class="form-group">
                            <label>Rating</label>
                            <div class="stars-select" id="rating-stars-select">
                                <i class="fa-solid fa-star active" data-rating="1"></i>
                                <i class="fa-solid fa-star active" data-rating="2"></i>
                                <i class="fa-solid fa-star active" data-rating="3"></i>
                                <i class="fa-solid fa-star active" data-rating="4"></i>
                                <i class="fa-solid fa-star active" data-rating="5"></i>
                            </div>
                            <input type="hidden" name="rating" id="input-rating" value="5">
                        </div>
                        <div class="form-group">
                            <label>Success Story Text</label>
                            <textarea name="text" class="form-control" placeholder="Review details..." required></textarea>
                        </div>
                        <button type="submit" class="btn"><i class="fa-solid fa-plus"></i> Publish Testimonial</button>
                    </form>
                </div>
                <div class="card">
                    <div class="card-title"><i class="fa-solid fa-comment-dots"></i> Client Feedbacks</div>
                    <div class="items-list" id="list-testimonials"></div>
                </div>
            </div>
        </div>

    </div>

    <!-- AJAX Client Operations Script -->
    <script>
        // ── Navigation tabs ──
        document.querySelectorAll('.sidebar-menu-item').forEach(item => {
            item.addEventListener('click', () => {
                document.querySelectorAll('.sidebar-menu-item').forEach(i => i.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
                
                item.classList.add('active');
                const tabId = item.getAttribute('data-tab');
                document.getElementById(`tab-${tabId}`).classList.add('active');
                loadData(tabId);
            });
        });

        // ── Rating Stars Click ──
        const starIcons = document.querySelectorAll('#rating-stars-select i');
        const ratingInput = document.getElementById('input-rating');
        starIcons.forEach(star => {
            star.addEventListener('click', () => {
                const rating = star.getAttribute('data-rating');
                ratingInput.value = rating;
                starIcons.forEach(s => {
                    if (s.getAttribute('data-rating') <= rating) {
                        s.classList.add('active');
                    } else {
                        s.classList.remove('active');
                    }
                });
            });
        });

        // ── API Operations ──
        async function fetchAPI(action, params = {}) {
            let url = `api.php?action=${action}`;
            let options = {};
            
            if (params instanceof FormData) {
                options = { method: 'POST', body: params };
            } else if (Object.keys(params).length > 0) {
                options = {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: new URLSearchParams(params)
                };
            }
            
            try {
                const res = await fetch(url, options);
                return await res.json();
            } catch(e) {
                console.error("API Call error:", e);
                return { success: false, message: 'Server or network error.' };
            }
        }

        // ── Load lists ──
        async function loadData(tab) {
            const listEl = document.getElementById(`list-${tab}`);
            if (!listEl) return;
            
            listEl.innerHTML = `<div style="text-align:center; padding:2rem; color:var(--text-muted);"><i class="fa-solid fa-spinner fa-spin"></i> Loading...</div>`;
            
            const res = await fetchAPI(`get_${tab}`);
            if (!res.success) {
                listEl.innerHTML = `<div style="color:#e63946; text-align:center; padding:2rem;">Error loading data.</div>`;
                return;
            }
            
            const data = res.data;
            if (data.length === 0) {
                listEl.innerHTML = `<div style="text-align:center; padding:3rem; color:var(--text-muted);">No entries added yet.</div>`;
                return;
            }
            
            listEl.innerHTML = '';
            data.forEach(item => {
                const row = document.createElement('div');
                row.className = 'item-row';
                
                if (tab === 'gallery') {
                    const folder = item.orientation === 'vertical' ? 'V/' : '';
                    row.innerHTML = `
                        <div class="item-info">
                            <img class="item-img" src="new_data/images/gallery/${folder}${item.filename}" alt="">
                            <div class="item-details">
                                <h4>${escapeHTML(item.title)}</h4>
                                <p>${escapeHTML(item.category)} • ${escapeHTML(item.orientation)}</p>
                            </div>
                        </div>
                        <button class="action-btn" onclick="deleteItem('gallery', '${item.id}')"><i class="fa-solid fa-trash"></i></button>
                    `;
                } else if (tab === 'clients') {
                    row.innerHTML = `
                        <div class="item-info">
                            <img class="item-img" src="new_data/images/clients/${item.filename}" alt="" style="object-fit:contain; background:#FFF;">
                            <div class="item-details">
                                <h4>${escapeHTML(item.name)}</h4>
                            </div>
                        </div>
                        <button class="action-btn" onclick="deleteItem('clients', '${item.id}')"><i class="fa-solid fa-trash"></i></button>
                    `;
                } else if (tab === 'services') {
                    row.innerHTML = `
                        <div class="item-info">
                            <div class="item-details">
                                <h4>${escapeHTML(item.title)}</h4>
                                <p>${escapeHTML(item.category)}</p>
                            </div>
                        </div>
                        <button class="action-btn" onclick="deleteItem('services', '${item.id}')"><i class="fa-solid fa-trash"></i></button>
                    `;
                } else if (tab === 'testimonials') {
                    const stars = '★'.repeat(item.rating) + '☆'.repeat(5 - item.rating);
                    row.innerHTML = `
                        <div class="item-info">
                            <div class="item-details">
                                <h4>${escapeHTML(item.name)}</h4>
                                <p>${escapeHTML(item.role)} • <span style="color:var(--accent-gold);">${stars}</span></p>
                            </div>
                        </div>
                        <button class="action-btn" onclick="deleteItem('testimonials', '${item.id}')"><i class="fa-solid fa-trash"></i></button>
                    `;
                }
                listEl.appendChild(row);
            });
        }

        // ── Delete actions ──
        async function deleteItem(tab, id) {
            if (!confirm('Are you sure you want to delete this item?')) return;
            const singular = tab.replace(/s$/, ''); // e.g. clients -> client
            const action = `delete_${singular}`;
            const res = await fetchAPI(action, { id });
            if (res.success) {
                loadData(tab);
            } else {
                alert(res.message);
            }
        }

        // ── Form submits ──
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                const id = form.getAttribute('id');
                const tab = id.replace('form-', '');
                const singular = tab.replace(/s$/, ''); // e.g. clients -> client
                const action = `add_${singular}`;
                
                const formData = new FormData(form);
                const res = await fetchAPI(action, formData);
                if (res.success) {
                    form.reset();
                    // Reset rating stars to 5 if testimonial form
                    if (tab === 'testimonials') {
                        ratingInput.value = 5;
                        starIcons.forEach(s => s.classList.add('active'));
                    }
                    loadData(tab);
                } else {
                    alert(res.message);
                }
            });
        });

        function escapeHTML(str) {
            if (!str) return '';
            return str.replace(/[&<>'"]/g, 
                tag => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', "'": '&#39;', '"': '&quot;' }[tag] || tag)
            );
        }

        // Initial load
        window.addEventListener('DOMContentLoaded', () => {
            loadData('gallery');
        });
    </script>
</body>
</html>
