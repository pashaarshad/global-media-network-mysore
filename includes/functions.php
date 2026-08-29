<?php
// ============================================================
// Global Media Network Mysore — Helper Functions
// Zero-MySQL JSON-based data engine
// ============================================================

/**
 * Read JSON data file and return decoded array.
 * Returns empty array if file missing or malformed.
 */
function get_json_data(string $filename): array {
    if ($filename === 'services.json') {
        require_once __DIR__ . '/static_services.php';
        return get_static_services();
    }
    $path = DATA_DIR . $filename;
    if (!file_exists($path)) return [];
    $raw = file_get_contents($path);
    $data = json_decode($raw, true);
    return is_array($data) ? $data : [];
}

/**
 * Read and merge original JSON data and new_data/ JSON data.
 */
function get_merged_json_data(string $filename): array {
    $original = get_json_data($filename);
    $new_path = __DIR__ . '/../new_data/' . $filename;
    if (file_exists($new_path)) {
        $raw = file_get_contents($new_path);
        $new_data = json_decode($raw, true);
        if (is_array($new_data)) {
            return array_merge($original, $new_data);
        }
    }
    return $original;
}

/**
 * Write data array to JSON file.
 * Returns true on success, false on failure.
 */
function save_json_data(string $filename, array $data): bool {
    $path = DATA_DIR . $filename;
    $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    return (bool) file_put_contents($path, $json);
}

/**
 * Append a single record to an existing JSON array file.
 */
function append_json_record(string $filename, array $record): bool {
    $data   = get_json_data($filename);
    $record['id']         = uniqid('', true);
    $record['created_at'] = date('Y-m-d H:i:s');
    $data[] = $record;
    return save_json_data($filename, $data);
}

/**
 * Sanitize user input string.
 */
function clean(string $input): string {
    return htmlspecialchars(strip_tags(trim($input)), ENT_QUOTES, 'UTF-8');
}

/**
 * Format a date string to a readable format.
 */
function fmt_date(string $date, string $format = 'd M Y'): string {
    return date($format, strtotime($date));
}
