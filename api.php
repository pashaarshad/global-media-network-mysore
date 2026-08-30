<?php
header('Content-Type: application/json');
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
require_once __DIR__ . '/includes/config.php';

$action = $_REQUEST['action'] ?? '';

function send_json($success, $message, $data = null) {
    echo json_encode(['success' => $success, 'message' => $message, 'data' => $data]);
    exit;
}

function get_json_file($filename) {
    $path = __DIR__ . '/new_data/' . $filename;
    if (!file_exists($path)) return [];
    $content = trim(file_get_contents($path));
    if (empty($content)) return [];
    return json_decode($content, true) ?: [];
}

function save_json_file($filename, $data) {
    $path = __DIR__ . '/new_data/' . $filename;
    file_put_contents($path, json_encode($data, JSON_PRETTY_PRINT));
}

switch ($action) {
    // ----------------------------------------------------
    // CLIENTS
    // ----------------------------------------------------
    case 'get_clients':
        send_json(true, '', get_json_file('clients.json'));
        break;

    case 'add_client':
        $name = $_POST['name'] ?? 'Unknown Client';
        if (!isset($_FILES['logo']) || $_FILES['logo']['error'] !== UPLOAD_ERR_OK) {
            send_json(false, 'Logo upload failed.');
        }
        $ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
        $id = uniqid('client_');
        $filename = $id . '.' . $ext;
        $dest = __DIR__ . '/new_data/images/clients/' . $filename;
        if (move_uploaded_file($_FILES['logo']['tmp_name'], $dest)) {
            $clients = get_json_file('clients.json');
            $clients[] = ['id' => $id, 'name' => $name, 'filename' => $filename];
            save_json_file('clients.json', $clients);
            send_json(true, 'Client added successfully.');
        }
        send_json(false, 'Failed to save logo.');
        break;

    case 'delete_client':
        $id = $_POST['id'] ?? '';
        $clients = get_json_file('clients.json');
        $new_clients = [];
        foreach ($clients as $c) {
            if ($c['id'] === $id) {
                $path = __DIR__ . '/new_data/images/clients/' . $c['filename'];
                if (file_exists($path)) unlink($path);
            } else {
                $new_clients[] = $c;
            }
        }
        save_json_file('clients.json', $new_clients);
        send_json(true, 'Client deleted.');
        break;

    // ----------------------------------------------------
    // GALLERY
    // ----------------------------------------------------
    case 'get_gallery':
        send_json(true, '', get_json_file('gallery.json'));
        break;

    case 'add_gallery':
        $title = $_POST['title'] ?? 'Gallery Image';
        $category = $_POST['category'] ?? 'events';
        $orientation = $_POST['orientation'] ?? 'horizontal'; // horizontal or vertical
        if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
            send_json(false, 'Image upload failed.');
        }
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $id = uniqid('img_');
        $filename = $id . '.' . $ext;
        
        $subfolder = ($orientation === 'vertical') ? 'V/' : '';
        $dest = __DIR__ . '/new_data/images/gallery/' . $subfolder . $filename;
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $dest)) {
            $gallery = get_json_file('gallery.json');
            $gallery[] = [
                'id' => $id,
                'title' => $title,
                'category' => $category,
                'filename' => $filename,
                'orientation' => $orientation
            ];
            save_json_file('gallery.json', $gallery);
            send_json(true, 'Image added successfully.');
        }
        send_json(false, 'Failed to save image.');
        break;

    case 'delete_gallery':
        $id = $_POST['id'] ?? '';
        $gallery = get_json_file('gallery.json');
        $new_gallery = [];
        foreach ($gallery as $g) {
            if ($g['id'] === $id) {
                $subfolder = ($g['orientation'] === 'vertical') ? 'V/' : '';
                $path = __DIR__ . '/new_data/images/gallery/' . $subfolder . $g['filename'];
                if (file_exists($path)) unlink($path);
            } else {
                $new_gallery[] = $g;
            }
        }
        save_json_file('gallery.json', $new_gallery);
        send_json(true, 'Image deleted.');
        break;

    // ----------------------------------------------------
    // SERVICES
    // ----------------------------------------------------
    case 'get_services':
        send_json(true, '', get_json_file('services.json'));
        break;

    case 'add_service':
        $title = $_POST['title'] ?? '';
        $desc = $_POST['desc'] ?? '';
        $category = $_POST['category'] ?? '';
        $items_str = $_POST['items'] ?? '';
        $items = array_filter(array_map('trim', explode(',', $items_str)));
        
        $services = get_json_file('services.json');
        $services[] = [
            'id' => uniqid('srv_'),
            'title' => $title,
            'description' => $desc,
            'category' => $category,
            'items' => $items
        ];
        save_json_file('services.json', $services);
        send_json(true, 'Service added.');
        break;

    case 'delete_service':
        $id = $_POST['id'] ?? '';
        $services = get_json_file('services.json');
        $new_services = array_values(array_filter($services, fn($s) => $s['id'] !== $id));
        save_json_file('services.json', $new_services);
        send_json(true, 'Service deleted.');
        break;

    // ----------------------------------------------------
    // TESTIMONIALS
    // ----------------------------------------------------
    case 'get_testimonials':
        send_json(true, '', get_json_file('testimonials.json'));
        break;

    case 'add_testimonial':
        $name = $_POST['name'] ?? '';
        $role = $_POST['role'] ?? '';
        $text = $_POST['text'] ?? '';
        $rating = (int)($_POST['rating'] ?? 5);
        
        $testimonials = get_json_file('testimonials.json');
        $testimonials[] = [
            'id' => uniqid('tst_'),
            'name' => $name,
            'role' => $role,
            'text' => $text,
            'rating' => $rating
        ];
        save_json_file('testimonials.json', $testimonials);
        send_json(true, 'Testimonial added.');
        break;

    case 'delete_testimonial':
        $id = $_POST['id'] ?? '';
        $testimonials = get_json_file('testimonials.json');
        $new_testimonials = array_values(array_filter($testimonials, fn($t) => $t['id'] !== $id));
        save_json_file('testimonials.json', $new_testimonials);
        send_json(true, 'Testimonial deleted.');
        break;

    // ----------------------------------------------------
    // INBOX SUBMISSIONS
    // ----------------------------------------------------
    case 'get_submissions':
        require_once __DIR__ . '/includes/functions.php';
        send_json(true, '', get_json_data('contacts.json'));
        break;

    case 'delete_submission':
        $id = $_POST['id'] ?? '';
        require_once __DIR__ . '/includes/functions.php';
        $submissions = get_json_data('contacts.json');
        $new_submissions = array_values(array_filter($submissions, fn($s) => $s['id'] !== $id));
        save_json_data('contacts.json', $new_submissions);
        send_json(true, 'Submission deleted.');
        break;

    default:
        send_json(false, 'Invalid action');
}
